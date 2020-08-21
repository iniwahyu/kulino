<?php 

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\Guru\ForumMapelModel;
use App\Models\Guru\ForumDiskusiModel;

class Fdiskusi extends BaseController
{
    private $web    = 'guru/forumdiskusi';
    private $webCus = 'guru/fdiskusi';

    public function __construct()
    {
        $this->forumMapel       = new ForumMapelModel();
        $this->forumDiskusi     = new ForumDiskusiModel();
    }

    public function diskusi($idForumMapel)
    {
        $checkForumMapel = $this->forumMapel->checkForumMapel($idForumMapel);
        $detailForumMapel   = $this->forumMapel->detail($idForumMapel)->getRowArray();
        $forumDiskusi       = $this->forumDiskusi->get($idForumMapel, 0);
        // dd(session()->get());
        if($checkForumMapel == null)
        {
            echo "Tidak Ditemukan";
        }
        else
        {
            $data = [
                'title'         => 'Mata Pelajaran '.$checkForumMapel['judul'],
                'web'           => $this->webCus,
                'fMapel'        => $checkForumMapel,
                'detail'        => $detailForumMapel,
                'diskusi'       => $forumDiskusi,
            ];
            echo view("$this->web/diskusi", $data);
        }
    }

    public function comment($idForumMapel)
    {
        // Config
        $post       = $this->request->getVar();
        $comment    = $this->request->getVar('comment');
        $berkas     = $this->request->getFile('berkas');
        $idUser     = session()->get('id');
        // Config

        if($berkas->getError() == 4)
        {
            $namaBerkas     = '';

            // Form Action
            $dataForm = [
                'id_forum_mapel'            => $idForumMapel,
                'id_user'                   => $idUser,
                'parent'                    => 0,
                'comment'                   => $comment,
                'berkas'                    => $namaBerkas,
            ];
            $this->forumDiskusi->save($dataForm);
            // Form Action

            // Session and Redirect
            session()->setFlashdata('sukses', 'Berhasil Menambahkan Komentar');
            return redirect()->to(base_url("guru/forum/diskusi/".$idForumMapel));
            // Session and Redirect
            // dd($dataForm);
        }
        else
        {
            $namaBerkas     = $berkas->getRandomName();
            $berkas->move("upload/materi", $namaBerkas);

            // Form Action
            $dataForm = [
                'id_forum_mapel'            => $idForumMapel,
                'id_user'                   => $idUser,
                'parent'                    => 0,
                'comment'                   => $comment,
                'berkas'                    => $namaBerkas,
            ];
            $this->forumDiskusi->save($dataForm);
            // Form Action

            // Session and Redirect
            session()->setFlashdata('sukses', 'Berhasil Menambahkan Komentar');
            return redirect()->to(base_url("guru/forum/diskusi/".$idForumMapel));
            // Session and Redirect
            dd($dataForm);
        }
        // Config
    }
}
