<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    private $web        = "admin/user";
    private $webCus     = '';
    private $table      = 'users';

    public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
        $user               = $this->crud->get('*', $this->table)->result_array();
        $data = [
            'title'         => 'Data User',
            'web'           => $this->web,
            'user'          => $user,
        ];
        $this->load->view("$this->web/index", $data);
    }
    
    public function create()
    {
        $data = [
            'title'         => 'Data User',
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
            'username'      => $post['username'],
            'level'         => $post['level'],
            'password'		=> password_hash($post['password'], PASSWORD_ARGON2I),
            'sandi'			=> $post['password'],
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
        // Checking
        $checkUser          = $this->crud->get_where('*', $this->table, ['id' => $id])->row_array();
        // Checking

        $data = [
            'title'         => 'Data User',
            'web'           => $this->web,
            'user'          => $checkUser,
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
        if($post['password'] == null)
        {
            $dataForm = [
                'username'      => $post['username'],
                'level'         => $post['level'],
            ];
            $this->crud->update($this->table, $dataForm, ['id' => $id]);
        }
        else
        {
            $dataForm = [
                'username'      => $post['username'],
                'level'         => $post['level'],
                'password'		=> password_hash($post['password'], PASSWORD_ARGON2I),
                'sandi'			=> $post['password'],
            ];
            $this->crud->update($this->table, $dataForm, ['id' => $id]);
        }
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