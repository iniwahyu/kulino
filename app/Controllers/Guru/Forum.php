<?php 

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\Guru\ForumModel;
use App\Models\Guru\ForumMapelModel;

class Forum extends BaseController
{
    private $web    = 'guru/forum';

    public function __construct()
    {
        $this->forum = new ForumModel();
        $this->forumMapel = new ForumMapelModel();
    }

	public function index()
	{
        $forum          = $this->forum->getForum()->getResultArray();
        // dd($forum);
        $data = [
            'title'     => 'Dashboard Guru',
            'web'       => $this->web,
            'forum'     => $forum,
        ];
        echo view("$this->web/index", $data);
    }
    
	public function create()
	{
        $data = [
            'title'     => 'Dashboard Guru',
            'web'       => $this->web,
        ];
        echo view("$this->web/create", $data);
    }
    
    public function store()
    {
        if($this->request->getMethod() == 'post')
        {
            $kode       = md5(rand(1,9).time()); 
            $dataForm   = [
                'id_mapel'          => $this->request->getVar('mapel'),
                'deskripsi'         => $this->request->getVar('deskripsi'),
                'id_guru'           => session()->get('id'),
                'kode'              => $kode
            ];
            $this->forum->save($dataForm);
            $id = $this->forum->insertID();
            session()->setFlashdata('sukses', 'Berhasil Membuat Forum Diskusi');
            return redirect()->to(base_url("guru/forum/detail/".$id));
        }
        else
        {
            echo "Invalid";
        }
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
        $idUser = session()->get('id');
        $forum  = $this->forum->find($id);
        if($forum)
        {
            $forumDetail    = $this->forum->forumDetail($idUser)->getRowArray();
            $forumMapel     = $this->forumMapel->getForumMapel($id);
            $data = [
                'title'     => 'Dashboard Guru',
                'web'       => $this->web,
                'forumDetail'   => $forumDetail,
                'forumMapel'    => $forumMapel,
            ];
            echo view("$this->web/detail", $data);
        }
        else
        {
            echo "Mau apa";
        }
    }
}
