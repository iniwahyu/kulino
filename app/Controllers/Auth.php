<?php 

namespace App\Controllers;
use App\Models\AuthModel;

class Auth extends BaseController
{
	private $web = 'auth';

	public function __construct()
	{
		$this->auth = new AuthModel();
	}

	public function login()
	{
		$data = [
			'title'			=> 'Login',
		];
		echo view("$this->web/login", $data);
	}

	public function proses_login()
	{
		$username		= $this->request->getVar('username');
		$password		= $this->request->getVar('password');

		$now			= date('Y-m-d H:i:s');

		$cekUsers		= $this->auth->getUsers(['username' => $username]);
		// dd($cekUsers->getFirstRow());
		if($cekUsers->getFirstRow())
		{
			$data	= $cekUsers->getRowArray();
			if(password_verify($password, $data['password']))
			{
				if($data['level'] == 1)
				{
					$setSession = [
						'id'		=> $data['id'],
						'username'	=> $username,
						'level'		=> $data['level'],
						'isLogged'	=> true,
					];
					session()->set($setSession);
					$update = $this->auth->updateLastLogin($now, $data['id']);
					return redirect()->to(base_url('admin'));
				}
				if($data['level'] == 2)
				{
					$setSession = [
						'id'		=> $data['id'],
						'username'	=> $username,
						'level'		=> $data['level'],
						'isLogged'	=> true,
					];
					session()->set($setSession);
					$update = $this->auth->updateLastLogin($now, $data['id']);
					return redirect()->to(base_url('guru'));
				}
				if($data['level'] == 3)
				{
					$setSession = [
						'id'		=> $data['id'],
						'username'	=> $username,
						'level'		=> $data['level'],
						'isLogged'	=> true,
					];
					session()->set($setSession);
					$update = $this->auth->updateLastLogin($now, $data['id']);
					return redirect()->to(base_url('siswa'));
				}
			}
			else
			{
				session()->setFlashdata('error', 'Password Salah');
				return redirect()->to('/login');
			}
		}
	}
}
