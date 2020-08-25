<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '../vendor/autoload.php';

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

    public function showComment($idForumMapel)
    {
        $data = $this->forum->getDetailComment($idForumMapel)->result_array();
        echo json_encode($data);
    }

    public function comment($idForumMapel)
    {
        // Config
        $post       = $this->input->post();
        // Config

        // Config Upload
        $config     = [
            'upload_path'       => './assets/upload/diskusi/',
            'allowed_types'     => 'jpg|jpeg|png|pdf',
            'max_size'          => 2048,
            'remove_space'      => true,
            'encrypt_name'      => true,
            'overwrite'         => true,
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // Config Upload

        if($this->upload->do_upload('berkas'))
        {
            $filename   = $this->upload->data('file_name');
            $dataForm   = [
                'id_forum_mapel'    => $idForumMapel,
                'id_user'           => $this->session->userdata('id'),
                'parent'            => 0,
                'comment'           => $post['comment'],
                'berkas'            => $filename,       
            ];
            $this->crud->insert('forum_diskusi', $dataForm);

            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'b2996c15c176cee9cf0f',
                'c1ee5102169de743bfa0',
                '845923',
                $options
            );
            
            $data['message'] = 'Berhasil';
            $pusher->trigger('my-channel', 'my-event', $data);
        }
        else
        {
            $dataForm   = [
                'id_forum_mapel'    => $idForumMapel,
                'id_user'           => $this->session->userdata('id'),
                'parent'            => 0,
                'comment'           => $post['comment'],
                'berkas'            => '',       
            ];
            $this->crud->insert('forum_diskusi', $dataForm);

            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'b2996c15c176cee9cf0f',
                'c1ee5102169de743bfa0',
                '845923',
                $options
            );
            
            $data['message'] = 'Berhasil';
            $pusher->trigger('my-channel', 'my-event', $data);
        }
    }

    public function detailComment($idForumDiskusi)
    {
        $data = $this->crud->get_where('*', 'forum_diskusi', ['id' => $idForumDiskusi])->row_array();
        echo json_encode($data);
    }

    public function commentEdit()
    {
        // Config
        $post       = $this->input->post();
        $idForumDiskusi = $post['id_forum_diskusi'];
        // Config

        // Config Upload
        $config     = [
            'upload_path'       => './assets/upload/diskusi/',
            'allowed_types'     => 'jpg|jpeg|png|pdf',
            'max_size'          => 2048,
            'remove_space'      => true,
            'encrypt_name'      => true,
            'overwrite'         => true,
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // Config Upload

        if($this->upload->do_upload('berkas'))
        {
            $filename   = $this->upload->data('file_name');
            $dataForm   = [
                'comment'           => $post['comment'],
                'berkas'            => $filename,       
            ];
            $this->crud->update('forum_diskusi', $dataForm, ['id' => $idForumDiskusi]);

            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'b2996c15c176cee9cf0f',
                'c1ee5102169de743bfa0',
                '845923',
                $options
            );
            
            $data['message'] = 'Berhasil';
            $pusher->trigger('my-channel', 'my-event', $data);
        }
        else
        {
            $filename   = $post['berkas'];
            $dataForm   = [
                'comment'           => $post['comment'],
                'berkas'            => $filename,       
            ];
            $this->crud->update('forum_diskusi', $dataForm, ['id' => $idForumDiskusi]);

            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'b2996c15c176cee9cf0f',
                'c1ee5102169de743bfa0',
                '845923',
                $options
            );
            
            $data['message'] = 'Berhasil';
            $pusher->trigger('my-channel', 'my-event', $data);
        }
    }

    public function detailBalasComment($idForumDiskusi)
    {
        $data = $this->forum->getDetailBalasComment($idForumDiskusi)->row_array();
        echo json_encode($data);
    }

    public function commentReply($idForumMapel)
    {
        // Config
        $post       = $this->input->post();
        // Config

        // Config Upload
        $config     = [
            'upload_path'       => './assets/upload/diskusi/',
            'allowed_types'     => 'jpg|jpeg|png|pdf',
            'max_size'          => 2048,
            'remove_space'      => true,
            'encrypt_name'      => true,
            'overwrite'         => true,
        ];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // Config Upload

        if($this->upload->do_upload('berkas'))
        {
            $filename   = $this->upload->data('file_name');
            $dataForm   = [
                'id_forum_mapel'    => $idForumMapel,
                'id_user'           => $this->session->userdata('id'),
                'parent'            => $post['id_forum_diskusi'],
                'comment'           => $post['comment'],
                'berkas'            => $filename,       
            ];
            $this->crud->insert('forum_diskusi', $dataForm);

            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'b2996c15c176cee9cf0f',
                'c1ee5102169de743bfa0',
                '845923',
                $options
            );
            
            $data['message'] = 'Berhasil';
            $pusher->trigger('my-channel', 'my-event', $data);
        }
        else
        {
            $dataForm   = [
                'id_forum_mapel'    => $idForumMapel,
                'id_user'           => $this->session->userdata('id'),
                'parent'            => $post['id_forum_diskusi'],
                'comment'           => $post['comment'],
                'berkas'            => '',       
            ];
            $this->crud->insert('forum_diskusi', $dataForm);

            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'b2996c15c176cee9cf0f',
                'c1ee5102169de743bfa0',
                '845923',
                $options
            );
            
            $data['message'] = 'Berhasil';
            $pusher->trigger('my-channel', 'my-event', $data);
        }
    }
}