<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\GuruModel;
use App\Models\Admin\UserModel;

class Guru extends BaseController
{
    private $web    = 'admin/guru';
    private $title  = 'Guru';

    public function __construct()
    {
        $this->guru = new GuruModel();
        $this->user = new UserModel();
    }

	public function index()
	{
        $guru           = $this->guru->getGuru();
        $data = [
            'title'     => $this->title,
            'web'       => $this->web,
            'guru'      => $guru,
        ];
        echo view("$this->web/index", $data);
    }
    
    public function create()
    {
        $user           = $this->user->allUsers('2');
        $data = [
            'title'     => "Tambah ".$this->title,
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
            $checkUsers         = $this->guru->checkUsers($post['username']);
            if($checkUsers > 0)
            {
                session()->setFlashdata('error', 'Username Telah Terdaftar');
                return redirect()->to('/admin/user');
            }
            else
            {
                $dataForm = [
                    'id_user'           => $post['username'],
                    'nuptk'             => $post['nuptk'],
                    'nama'              => $post['nama'],
                    'email'             => $post['email'],
                    'nohp'              => $post['nohp'],
                ];
                $this->guru->save($dataForm);
                
                // Set Session Flash Data
                session()->setFlashdata('sukses', 'Berhasil Menambahkan Guru');
                return redirect()->to('/admin/guru');
            }
		}
    }

    public function edit($id)
    {
        $user           = $this->user->allUsers('2');
        $guru           = $this->guru->getGuru($id);
        $data = [
            'title'     => "Edit ".$this->title,
            'web'       => $this->web,
            'user'      => $user,
            'guru'      => $guru,
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
                'nuptk'             => $post['nuptk'],
                'nama'              => $post['nama'],
                'email'             => $post['email'],
                'nohp'              => $post['nohp'],
            ];
            $this->guru->update($id, $dataForm);
            
            // Set Session Flash Data
            session()->setFlashdata('sukses', 'Berhasil Mengubah Guru');
            return redirect()->to('/admin/guru');
		}
    }

    public function delete($id)
    {
        $guru = $this->guru->find($id);
        if($guru)
        {
            $this->guru->delete($id);
            session()->setFlashdata('sukses', 'Berhasil Menghapus Guru');
            return redirect()->to(base_url('admin/guru'));
        }
        else
        {
            session()->setFlashdata('sukses', 'Gagal Menghapus Guru');
            return redirect()->to(base_url('admin/guru'));
        }
    }
}
