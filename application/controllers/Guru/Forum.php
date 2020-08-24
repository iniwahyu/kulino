<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    private $web        = "guru/forum";
    private $webCus     = '';
    private $table      = 'forum';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru/Forum_model', 'forum');
    }

	public function index()
	{
        // Config
        $idGuru         = $this->session->userdata('id');
        // Config

        $forum  = $this->forum->getForum($idGuru)->result_array();
        $data = [
            'title'         => 'Forum',
            'web'           => $this->web,
            'forum'         => $forum,
        ];
        $this->load->view("$this->web/index", $data);
    }
    
    public function create()
    {
        $mapel              = $this->crud->get('*', 'master_mapel')->result_array();
        $data = [
            'title'         => 'Forum',
            'web'           => $this->web,
            'mapel'         => $mapel,
        ];
        $this->load->view("$this->web/create", $data);
    }

    public function store()
    {
        // Config
        $post       = $this->input->post();
        $kode       = md5(rand(1,9).time()); 
        // Config

        // Form Action
        $dataForm = [
            'id_mapel'          => $post['mapel'],
            'deskripsi'         => $post['deskripsi'],
            'id_guru'           => $this->session->userdata('id'),
            'kode'              => $kode
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
        $mapel              = $this->crud->get('*', 'master_mapel')->result_array();
        $forum              = $this->crud->get_where('*', $this->table, ['id' => $id])->row_array();
        $data = [
            'title'         => 'Forum',
            'web'           => $this->web,
            'mapel'         => $mapel,
            'id'            => $id,
            'forum'         => $forum,
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
            'id_mapel'          => $post['mapel'],
            'deskripsi'         => $post['deskripsi'],
            'id_guru'           => $this->session->userdata('id'),
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
        // Checking
        $checkForum     = $this->crud->get_where('*', $this->table, ['id' => $id]);
        $idGuru         = $this->session->userdata('id');
        // Checking

        if($checkForum->num_rows() > 0)
        {
            $forum              = $this->forum->getForum($idGuru)->row_array();
            $forumMapel         = $this->forum->getForumMapel($id, $idGuru)->result_array();
            $data = [
                'title'         => 'Forum',
                'web'           => $this->web,
                'id'            => $id,
                'forum'         => $forum,
                'forumMapel'    => $forumMapel,
            ];
            $this->load->view("$this->web/detail", $data);
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Forum Tidak Ditemukan');
            redirect(base_url("$this->web"));
        }
    }

    public function diskusi($idForumMapel)
    {
        // Checking
        $checkForum     = $this->crud->get_where('*', 'forum_mapel', ['id' => $idForumMapel]);
        $idGuru         = $this->session->userdata('id');
        // Checking

        if($checkForum->num_rows() > 0)
        {
            $forum              = $this->forum->getForumDiskusi($idForumMapel)->row_array();
            $data = [
                'title'         => 'Forum',
                'web'           => $this->web,
                'idForumMapel'  => $idForumMapel,
                // 'forumMapel'    => $forumMapel,
                'forum'         => $forum,
                // 'forumMapel'    => $forumMapel,
            ];
            $this->load->view("$this->web/diskusi", $data);
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Forum Tidak Ditemukan');
            redirect(base_url("$this->web"));
        }
    }
}