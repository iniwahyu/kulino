<?php 

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    private $web    = 'admin/dashboard';
    private $model;

	public function index()
	{
        $data = [
            'title'     => 'Dashboard Admin',
        ];
        echo view("$this->web/index", $data);
	}
}
