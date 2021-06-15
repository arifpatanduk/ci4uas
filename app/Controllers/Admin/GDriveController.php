<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;

include '../vendor/autoload.php';

class GDriveController extends BaseController
{
    protected $client;
    protected $service;

    public function __construct(){
        // setting config untuk layanan akses ke google drive
        $this->client = new Google_Client();
        $this->client->setAuthConfig("../oauth-credentials.json");
        $this->client->addScope("https://www.googleapis.com/auth/drive");
        $this->service = new Google_Service_Drive($this->client);
    }

	public function gdrive()
	{
        // proses membaca token pasca login
        if (isset($_GET['code'])) {
            $token = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
            // simpan token ke session
            $_SESSION['upload_token'] = $token;
        }

        if (empty($_SESSION['upload_token'])){
            // jika token belum ada, maka lakukan login via oauth
            $authUrl = $this->client->createAuthUrl();
            
            return redirect()->to($authUrl);
        } 
        else {

            $data = [
                'title' => 'Dokumen',
                'active' => 'dokumen',
            ];
            return view('admin/gdrive', $data);
        }
	}

	public function upload()
	{
            $data = [
                'title' => 'Dokumen',
                'active' => 'dokumen',
            ];

            // menggunakan token untuk mengakses google drive  
            $this->client->setAccessToken($_SESSION['upload_token']);
            // membaca token respon dari google drive
            $this->client->getAccessToken();
    
            // instansiasi obyek file yg akan diupload ke Google Drive
            $file = new Google_Service_Drive_DriveFile();
            // set nama file di Google Drive disesuaikan dg nama file aslinya
            $file->setName($_FILES["fileToUpload"]["name"]);
            // proses upload file ke Google Drive dg multipart
            $result = $this->service->files->create($file, array(
                'data' => file_get_contents($_FILES["fileToUpload"]["tmp_name"]),
                'mimeType' => 'application/octet-stream',
                'uploadType' => 'multipart'));
    
            // menampilkan nama file yang sudah diupload ke google drive
            var_dump($result);
            echo $result->name."<br>";
        
        return view('admin/gdrive', $data);
	}

}