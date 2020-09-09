<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    private $web        = "auth";
    private $webCus     = '';
    private $table      = 'users';
    private $tableAlias = 'users AS u';

    public function __construct()
    {
        parent::__construct();
    }

	public function login()
	{
        $data = [
            'title'         => 'Login Guru dan Siswa',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/login", $data);
    }
    
    public function signin()
    {
        // Config
        $post           = $this->input->post();
        $username       = $post['username'];
        $password       = $post['password'];
        // Config

        // Checking
        $checkUser      = $this->crud->get_where('*', $this->table, ['username' => $username]);
        // Checking

        if($checkUser->num_rows() > 0)
        {
            $dataUser   = $checkUser->row_array();
            if(password_verify($password, $dataUser['password']))
            {
                if($dataUser['level'] == 1)
                {
                    $sesi = [
                        'id'        => $dataUser['id'],
                        'username'  => $dataUser['username'],
                        'level'     => $dataUser['level'],
                    ];
                    $this->session->set_userdata($sesi);
                    redirect(base_url('admin'));
                }
                if($dataUser['level'] == 2)
                {
                    $sesi = [
                        'id'        => $dataUser['id'],
                        'username'  => $dataUser['username'],
                        'level'     => $dataUser['level'],
                    ];
                    $this->session->set_userdata($sesi);
                    redirect(base_url('guru'));
                }
                if($dataUser['level'] == 3)
                {
                    $sesi = [
                        'id'        => $dataUser['id'],
                        'username'  => $dataUser['username'],
                        'level'     => $dataUser['level'],
                    ];
                    $this->session->set_userdata($sesi);
                    redirect(base_url('siswa'));
                }
            }
            else
            {
                $this->session->set_flashdata('gagal', 'Password Salah');
                redirect(base_url("$this->web/login"));
            }
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Akun Tidak Ditemukan');
            redirect(base_url("$this->web/login"));
        }
    }

    public function guruLogin()
    {
        $data = [
            'title'         => 'Login Guru',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/guruLogin", $data);
    }

    public function siswaLogin()
    {
        $data = [
            'title'         => 'Login Siswa',
            'web'           => $this->web,
        ];
        $this->load->view("$this->web/siswaLogin", $data);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("$this->web/login"));
    }
}