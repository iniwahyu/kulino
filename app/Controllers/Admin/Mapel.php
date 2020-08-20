<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\MapelModel;

class Mapel extends BaseController
{
    private $web    = 'admin/mapel';

    public function __construct()
    {
        $this->mapel = new MapelModel();
    }

	public function index()
	{
        $mapel          = $this->mapel->getMapel();
        $data = [
            'title'     => 'Data Mapel',
            'web'       => $this->web,
            'mapel'     => $mapel,
        ];
        echo view("$this->web/index", $data);
    }
    
    public function create()
    {
        $data = [
            'title'     => "Tambah Mapel",
            'web'       => $this->web,
        ];
        echo view("$this->web/create", $data);
    }

    public function store()
    {
        if($this->request->getMethod() == 'post')
		{
            $post               = $this->request->getVar();
            $dataForm = [
                'kelas'             => $post['kelas'],
                'nama'              => $post['nama'],
            ];
            $this->mapel->save($dataForm);
            
            // Set Session Flash Data
            session()->setFlashdata('sukses', 'Berhasil Menambahkan Mata Pelajaran');
            return redirect()->to('/admin/mapel');
		}
    }

    public function edit($id)
    {
        $mapel          = $this->mapel->getMapel($id);
        $data = [
            'title'     => "Edit Mata Pelajaran",
            'web'       => $this->web,
            'mapel'     => $mapel,
        ];
        echo view("$this->web/edit", $data);
    }

    public function update($id)
    {
        if($this->request->getMethod() == 'post')
		{
            $post               = $this->request->getVar();
            $dataForm = [
                'kelas'             => $post['kelas'],
                'nama'              => $post['nama'],
            ];
            $this->mapel->update($id, $dataForm);
            
            // Set Session Flash Data
            session()->setFlashdata('sukses', 'Berhasil Mengubah Mata Pelajaran');
            return redirect()->to('/admin/mapel');
		}
    }

    public function delete($id)
    {
        $guru = $this->mapel->find($id);
        if($guru)
        {
            $this->mapel->delete($id);
            session()->setFlashdata('sukses', 'Berhasil Menghapus Mata Pelajaran');
            return redirect()->to(base_url('admin/mapel'));
        }
        else
        {
            session()->setFlashdata('sukses', 'Gagal Menghapus Mata Pelajaran');
            return redirect()->to(base_url('admin/mapel'));
        }
    }
}
