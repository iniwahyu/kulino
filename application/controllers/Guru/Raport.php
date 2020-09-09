<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {

    private $web        = "guru/raport";
    private $webCus     = '';

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data = [
            'title'         => 'Data Raport',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/index", $data);
	}
    
    public function create()
	{
        $data = [
            'title'         => 'Tambah Nilai Raport',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/create", $data);
    }
    
    public function edit($id)
    {
        $data = [
            'title'         => 'Edit Nilai Raport',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/create", $data);
    }
}