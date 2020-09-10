<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    private $web        = "admin/forum";
    private $webCus     = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Forum_model', 'forum');
    }

	public function index()
	{
        $forum              = $this->forum->getForumAll()->result_array();
        $data = [
            'title'         => 'Data Forum',
            'web'           => $this->web,
            'forum'         => $forum,
        ];
        $this->load->view("$this->web/index", $data);
    }

    public function detail($id)
    {
        $forum              = $this->forum->getForumAllWhere($id)->row_array();
        $mapel              = $this->crud->get_where('*', 'forum_mapel', ['id_forum' => $id], 'pertemuan ASC')->result_array();
        $siswa              = $this->forum->getSiswaByForum($id)->result_array();
        $data = [
            'title'         => 'Forum Detail',
            'web'           => $this->web,
            'forum'         => $forum,
            'mapel'         => $mapel,
            'siswa'         => $siswa,
        ];
        $this->load->view("$this->web/detail", $data);
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
}