<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '../vendor/autoload.php';

class Forum extends CI_Controller {

    private $web        = "siswa/forum";
    private $webCus     = '';
    private $table      = 'forum';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa/Forum_model', 'forum');
    }

	public function index()
	{
        // Config
        $idUser         = $this->session->userdata('id');
        // Config

        $forum  = $this->forum->getForum($idUser)->result_array();
        $data = [
            'title'         => 'Forum',
            'web'           => $this->web,
            'forum'         => $forum,
        ];
        $this->load->view("$this->web/index", $data);
    }

    public function join()
    {
        // Config
        $post               = $this->input->post();
        $idUser             = $this->session->userdata('id');
        // Config

        // Checking Forum
        $checkForum         = $this->crud->get_where('*', $this->table, ['kode' => $post['kode']]);
        // Checking Forum

        if($checkForum->num_rows() > 0)
        {
            $dataForum  = $checkForum->row_array();
            $checkUsers = $this->crud->get_where('*', 'forum_anggota', ['id_user' => $idUser, 'kode' => $post['kode']]);
            if($checkUsers->num_rows() > 0)
            {
                $response = [
                    'status'    => 400,
                    'message'   => 'Sudah Bergabung',
                ];
                echo json_encode($response);
            }
            else
            {
                $dataForm   = [
                    'id_forum'  => $dataForum['id'],
                    'id_user'   => $idUser,
                    'kode'      => $post['kode'],
                ];
                $this->crud->insert('forum_anggota', $dataForm);
                $response   = [
                    'status'    => 200,
                    'message'   => 'Berhasil Bergabung',
                ];
                echo json_encode($response);
            }
        }
        else
        {
            $response = [
                'status'    => 400,
                'message'   => 'Forum Tidak Ditemukan',
            ];
            echo json_encode($response);
        }
    }

    public function detail($idForum)
    {
        // Checking
        $checkForum     = $this->crud->get_where('*', $this->table, ['id' => $idForum]);
        $idUser         = $this->session->userdata('id');
        // Checking

        if($checkForum->num_rows() > 0)
        {
            $dataForum          = $checkForum->row_array();
            $forum              = $this->forum->getForum($idForum)->row_array();
            $forumMapel         = $this->crud->get_where('*', 'forum_mapel', ['id_forum' => $idForum], 'pertemuan ASC')->result_array();
            $data = [
                'title'         => 'Forum',
                'web'           => $this->web,
                'id'            => $idForum,
                'forum'         => $forum,
                'forumMapel'    => $forumMapel,
            ];
            $this->load->view("$this->web/detail", $data);
        }
        else
        {
            // print_r($checkForum); die;
            $this->session->set_flashdata('gagal', 'Forum Tidak Ditemukan');
            redirect(base_url("$this->web"));
        }
    }

    public function diskusi($idForumMapel)
    {
        // Checking
        $checkForumMapel    = $this->crud->get_where('*', 'forum_mapel', ['id' => $idForumMapel]);
        // Checking

        if($checkForumMapel->num_rows() > 0)
        {
            // Query
            $dataForumMapel = $checkForumMapel->row_array();
            $forumMapel     = $this->forum->getForumMapelDetail($idForumMapel)->row_array();
            // Query

            $data   = [
                'title'         => 'Forum Diskusi',
                'web'           => $this->web,
                'idForumMapel'  => $idForumMapel,
                'forumMapel'    => $forumMapel,
                'fmapel'        => $dataForumMapel
            ];
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>"; die;
            $this->load->view("$this->web/diskusi", $data);
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Mata Pelajaran Tidak Ditemukan');
            redirect(base_url("$this->web"));
        }
    }
    
    public function showComment($idForumMapel)
    {
        $data = $this->forum->showComment($idForumMapel)->result_array();
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

    // Function Download
    public function downloadMateri($idForumMapel)
    {
        $this->load->helper('download');
        // Checking
        $checkForumMapel = $this->crud->get_where('*', 'forum_mapel', ['id' => $idForumMapel]);
        // Checking

        if($checkForumMapel->num_rows() > 0)
        {
            $data   = $checkForumMapel->row_array();
            $path   = FCPATH . '/assets/upload/materi/'.$data['berkas'];
            // print_r($path);
            $haaa = file_get_contents($path);
            if($haaa)
            {
                force_download($path, null);
                $this->session->set_flashdata('sukses', 'Berhasil Download');
                redirect(base_url("$this->web/diskusi/".$idForumMapel));
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Berkas Tidak Ditemukan');
                redirect(base_url("$this->web/diskusi/".$idForumMapel));
            }
        }
        else
        {
            echo "Hi";
        }
    }

    public function downloadBerkasDiskusi($idForumDiskusi)
    {
        $this->load->helper('download');
        // Checking
        $checkBerkas = $this->crud->get_where('*', 'forum_diskusi', ['id' => $idForumDiskusi]);
        // Checking

        if($checkBerkas->num_rows() > 0)
        {
            $data   = $checkBerkas->row_array();
            $path   = FCPATH . '/assets/upload/diskusi/'.$data['berkas'];
            // print_r($path);
            $haaa = file_get_contents($path);
            if($haaa)
            {
                force_download($path, null);
                $this->session->set_flashdata('sukses', 'Berhasil Download');
                // redirect(base_url("$this->web/diskusi/".$idForumMapel));
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Berkas Tidak Ditemukan');
                // redirect(base_url("$this->web/diskusi/".$idForumMapel));
            }
        }
        else
        {
            echo "Hi";
        }
    }
    // Function Download
}