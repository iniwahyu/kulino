<?php 

namespace App\Controllers\Guru;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    private $web    = 'guru/dashboard';
    private $model;

	public function index()
	{
        $data = [
            'title'     => 'Dashboard Guru',
        ];
        echo view("$this->web/index", $data);
	}
}
