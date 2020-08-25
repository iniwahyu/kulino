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
        else
        {
            $response = [
                'status'    => 400,
                'message'   => 'Forum Tidak Ditemukan',
            ];
            echo json_encode($response);
        }
    }
}