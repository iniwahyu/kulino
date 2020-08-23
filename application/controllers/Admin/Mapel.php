<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel extends CI_Controller {

    private $web        = "admin/mapel";
    private $webCus     = '';
    private $table      = 'master_mapel';
    private $tableAlias = 'master_mapel AS mm';

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $mapel           = $this->crud->get('*', $this->table)->result_array();
        $data = [
            'title'         => 'Data Pengguna',
            'web'           => $this->web,
            'mapel'         => $mapel,
        ];
        $this->load->view("$this->web/index", $data);
    }
    
    public function create()
    {
        $data = [
            'title'         => 'Tambah Pengguna',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/create", $data);
    }

    public function store()
    {
        // Config
        $post       = $this->input->post();
        // Config

        // Form Action
        $dataForm = [
            'kelas'         => $post['kelas'],
            'nama'          => $post['nama'],
        ];
        $this->crud->insert($this->table, $dataForm);
        // Form Action

        // Session and Redirect
        $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
        redirect(base_url("$this->web"));
        // Session and Redirect
    }

    public function edit($id)
    {
        $mapel              = $this->crud->get('*', $this->table, ['id' => $id])->row_array();

        $data = [
            'title'         => 'Data User',
            'web'           => $this->web,
            'mapel'         => $mapel,
            'id'            => $id,
        ];
        $this->load->view("$this->web/edit", $data);
    }

    public function update($id)
    {
        // Config
        $post       = $this->input->post();
        // Config

        // Form Action
        $dataForm = [
            'kelas'         => $post['kelas'],
            'nama'          => $post['nama'],
        ];
        $this->crud->update($this->table, $dataForm, ['id' => $id]);
        // Form Action

        // Session and Redirect
        $this->session->set_flashdata('sukses', 'Berhasil Mengubah Data');
        redirect(base_url("$this->web"));
        // Session and Redirect
    }

    public function delete($id)
    {
        $this->crud->delete($this->table, ['id' => $id]);
        $this->session->set_flashdata('sukses', 'Berhasil Menghapus Data');
        redirect(base_url("$this->web"));
    }

    public function detail($id)
    {

    }
}