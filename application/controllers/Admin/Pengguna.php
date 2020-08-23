<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    private $web        = "admin/pengguna";
    private $webCus     = '';
    private $table      = 'pengguna';

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $pengguna           = $this->crud->get('*', $this->table)->result_array();
        $data = [
            'title'         => 'Data Pengguna',
            'web'           => $this->web,
            'pengguna'      => $pengguna,
        ];
        $this->load->view("$this->web/index", $data);
    }
    
    public function create()
    {
        $user               = $this->crud->get('*', 'users')->result_array();
        $data = [
            'title'         => 'Tambah Pengguna',
            'web'           => $this->web,
            'user'          => $user,
        ];
        $this->load->view("$this->web/create", $data);
    }

    public function store()
    {
        // Config
        $post       = $this->input->post();
        // Config

        // Checking
        $checkUser  = $this->crud->get_where('*', $this->table, ['id_user' => $post['username']])->num_rows();
        // Checking

        if($checkUser > 0)
        {
            $this->session->set_flashdata('gagal', 'Username Telah Digunakan');
            redirect(base_url("$this->web/create"));
        }
        else
        {
            // Form Action
            $dataForm = [
                'id_user'           => $post['username'],
                'kode'              => $post['kode'],
                'nama'              => $post['nama'],
                'jenis_kelamin'     => $post['jenis_kelamin'],
                'email'             => $post['email'],
                'nohp'              => $post['nohp'],
            ];
            $this->crud->insert($this->table, $dataForm);
            // Form Action
        }

        // Session and Redirect
        $this->session->set_flashdata('sukses', 'Berhasil Menambahkan Data');
        redirect(base_url("$this->web"));
        // Session and Redirect
    }

    public function edit($id)
    {
        // Checking
        $checkPengguna      = $this->crud->get_where('*', $this->table, ['id' => $id])->row_array();
        // Checking

        $user               = $this->crud->get('*', 'users')->result_array();

        $data = [
            'title'         => 'Data User',
            'web'           => $this->web,
            'pengguna'      => $checkPengguna,
            'user'          => $user,
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
            'kode'              => $post['kode'],
            'nama'              => $post['nama'],
            'jenis_kelamin'     => $post['jenis_kelamin'],
            'email'             => $post['email'],
            'nohp'              => $post['nohp'],
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