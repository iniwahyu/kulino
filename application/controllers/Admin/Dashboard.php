<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private $web        = "admin/dashboard";
    private $webCus     = '';

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data = [
            'title'         => 'Dashboard Admin',
        ];
        $this->load->view("$this->web/index", $data);
	}
}