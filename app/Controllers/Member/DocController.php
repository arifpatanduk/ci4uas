<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class DocController extends BaseController
{
	public function detail_guest()
	{
		$data = [
			'title' => 'Document',
			'active' => 'home',
		];

		return view('/detail', $data);
	}

	public function detail_member()
	{
		$data = [
			'title' => 'Document',
			'active' => 'home',
		];

		return view('/user/detail', $data);
	}
}
