<?php 

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\Guru\ForumMapelModel;

class Fdiskusi extends BaseController
{
    private $web    = 'guru/forummapel';
    private $webCus = 'guru/fmapel';

    public function __construct()
    {
        $this->forumMapel = new ForumMapelModel();
    }

	public function index()
	{
        
    }
    
	public function create($idForum)
	{
        $data = [
            'title'     => 'Dashboard Guru',
            'web'       => $this->webCus,
            'idForum'   => $idForum,
        ];
        echo view("$this->web/create", $data);
    }
    
    public function store()
    {
        // Global
        $post       = $this->request->getVar();
        $idForum    = $post['id_forum'];
        // Global

        // Config Upload File
        $berkas     = $this->request->getFile('berkas');
        $namaBerkas = $berkas->getRandomName();
        $berkas->move('upload/berkas', $namaBerkas);
        // Config Upload File

        // Form
        $dataForm   = [
            'id_forum'      => $idForum ,
            'pertemuan'     => $post['pertemuan'],
            'judul'         => $post['judul'],
            'deskripsi'     => $post['deskripsi'],
            'berkas'        => $namaBerkas,
        ];
        $this->forumMapel->save($dataForm);
        // Form
        
        // Session Flash Data
        session()->setFlashdata('sukses', 'Berhasil Membuat Forum Diskusi');
        // Session Flash Data

        // Redirect
        return redirect()->to(base_url("guru/forum/detail/".$idForum));
        // Redirect
    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }

    public function delete($id)
    {

    }

    public function detail($id)
    {
       
    }
}
