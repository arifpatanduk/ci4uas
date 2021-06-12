<?php

namespace App\Controllers\Member;

use App\Controllers\BaseController;

class DocController extends BaseController
{
	public function detail()
	{
		$data = [
			'title' => 'Document',
			'active' => 'home',
		];

		return view('/user/detail', $data);
	}
}
