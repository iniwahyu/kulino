<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

    private $web        = "guru/ujian";
    private $webCus     = '';

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $data = [
            'title'         => 'Data Ujian',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/index", $data);
	}
    
    public function create()
	{
        $data = [
            'title'         => 'Tambah Nilai Ujian',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/create", $data);
    }
    
    public function edit($id)
    {
        $data = [
            'title'         => 'Edit Nilai Ujian',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/create", $data);
    }
}