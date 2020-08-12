<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel;

class User extends BaseController
{
    private $web    = 'admin/user';
    private $title  = 'User';
    protected $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

	public function index()
	{
        $user          = $this->users->getUsers();
        $data = [
            'title'     => $this->title,
            'web'       => $this->web,
            'user'      => $user,
        ];
        echo view("$this->web/index", $data);
    }
    
    public function create()
    {
        $data = [
            'title'     => "Tambah ".$this->title,
            'web'       => $this->web,
        ];
        echo view("$this->web/create", $data);
    }

    public function store()
    {
        if($this->request->getMethod() == 'post')
		{
			$rules = [
				'username'      => 'required|is_unique[users.username]',
				'password'		=> 'required|min_length[3]|max_length[100]',
				'sandi'			=> 'matches[password]',
			];

			if(!$this->validate($rules))
			{
				$validation	= $this->validator;
				$data = [
                    'title'     => "Tambah ".$this->title,
                    'web'       => $this->web,
					'validation'		=> $this->validator,
				];
				echo view("$this->web/create", $data);
			}
			else
			{
				$dataForm = [
					'username'      => $this->request->getVar('username'),
					'level'         => $this->request->getVar('level'),
					'password'		=> password_hash($this->request->getVar('password'), PASSWORD_ARGON2I),
					'sandi'			=> $this->request->getVar('sandi'),
				];
				$this->users->save($dataForm);

				// Set Session Flash Data
				session()->setFlashdata('sukses', 'Berhasil Menambahkan User');
				return redirect()->to('/admin/user');
			}
		}
    }

    public function edit($id)
    {
        $user          = $this->users->getUsers($id);
        $data = [
            'title'     => $this->title,
            'web'       => $this->web,
            'user'      => $user,
            'id'        => $id,
        ];
        echo view("$this->web/edit", $data);
    }

    public function update($id)
    {
        $rules = [
            'username'      => 'required',
        ];

        if(!$this->validate($rules))
        {
            $validation	= $this->validator;
            $user          = $this->users->getUsers($id);
            $data = [
                'title'     => $this->title,
                'web'       => $this->web,
                'user'      => $user,
                'validation'=> $this->validator,
            ];
            echo view("$this->web/edit", $data);
        }
        else
        {
            if($this->request->getVar('password') == null)
            {
                $dataForm = [
                    'username'      => $this->request->getVar('username'),
                    'level'         => $this->request->getVar('level'),
                ];
                $this->users->update($id, $dataForm);
            }
            else
            {
                $dataForm = [
                    'username'      => $this->request->getVar('username'),
                    'level'         => $this->request->getVar('level'),
                    'password'		=> password_hash($this->request->getVar('password'), PASSWORD_ARGON2I),
                    'sandi'			=> $this->request->getVar('sandi'),
                ];
                $this->users->update($id, $dataForm);
            }

            // Set Session Flash Data
            session()->setFlashdata('sukses', 'Berhasil Mengubah User');
            return redirect()->to("/admin/user");
        }
    }

    public function delete($id)
    {
        $users = $this->users->find($id);
        if($users)
        {
            $this->users->delete($id);
            session()->setFlashdata('sukses', 'Berhasil Menghapus User');
            return redirect()->to(base_url('admin/user'));
        }
        else
        {
            session()->setFlashdata('sukses', 'Gagal Menghapus User');
            return redirect()->to(base_url('admin/user'));
        }

    }

    public function destroy()
    {

    }
}
