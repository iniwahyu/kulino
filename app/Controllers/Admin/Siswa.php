<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SiswaModel;
use App\Models\Admin\UserModel;

class Siswa extends BaseController
{
    private $web    = 'admin/siswa';

    public function __construct()
    {
        $this->siswa = new SiswaModel();
        $this->user = new UserModel();
    }

	public function index()
	{
        $siswa          = $this->siswa->getSiswa();
        $data = [
            'title'     => 'Data Siswa',
            'web'       => $this->web,
            'siswa'     => $siswa,
        ];
        echo view("$this->web/index", $data);
    }
    
    public function create()
    {
        $user           = $this->user->allUsers('3');
        $data = [
            'title'     => "Tambah Siswa",
            'web'       => $this->web,
            'user'      => $user,
        ];
        echo view("$this->web/create", $data);
    }

    public function store()
    {
        if($this->request->getMethod() == 'post')
		{
            $post               = $this->request->getVar();
            $checkUsers         = $this->siswa->checkUsers($post['username']);
            if($checkUsers > 0)
            {
                session()->setFlashdata('error', 'Username Telah Terdaftar');
                return redirect()->to(base_url('/admin/user'));
            }
            else
            {
                $dataForm = [
                    'id_user'           => $post['username'],
                    'nis'               => $post['nis'],
                    'jenis_kelamin'     => $post['jenis_kelamin'],
                    'nama'              => $post['nama'],
                    'email'             => $post['email'],
                    'nohp'              => $post['nohp'],
                ];
                $this->siswa->save($dataForm);
                
                // Set Session Flash Data
                session()->setFlashdata('sukses', 'Berhasil Menambahkan Siswa');
                return redirect()->to('/admin/siswa');
            }
		}
    }

    public function edit($id)
    {
        $user           = $this->user->allUsers('3');
        $siswa          = $this->siswa->getSiswa($id);
        $data = [
            'title'     => "Edit Siswa",
            'web'       => $this->web,
            'user'      => $user,
            'siswa'     => $siswa,
        ];
        echo view("$this->web/edit", $data);
    }

    public function update($id)
    {
        if($this->request->getMethod() == 'post')
		{
            $post               = $this->request->getVar();
            $dataForm = [
                'id_user'           => $post['username'],
                'nis'               => $post['nis'],
                'nama'              => $post['nama'],
                'jenis_kelamin'     => $post['jenis_kelamin'],
                'email'             => $post['email'],
                'nohp'              => $post['nohp'],
            ];
            $this->siswa->update($id, $dataForm);
            
            // Set Session Flash Data
            session()->setFlashdata('sukses', 'Berhasil Mengubah Siswa');
            return redirect()->to('/admin/siswa');
		}
    }

    public function delete($id)
    {
        $guru = $this->siswa->find($id);
        if($guru)
        {
            $this->siswa->delete($id);
            session()->setFlashdata('sukses', 'Berhasil Menghapus Siswa');
            return redirect()->to(base_url('admin/siswa'));
        }
        else
        {
            session()->setFlashdata('sukses', 'Gagal Menghapus Siswa');
            return redirect()->to(base_url('admin/siswa'));
        }
    }
}
