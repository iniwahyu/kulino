<?php 

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class User extends BaseController
{
    private $web    = 'admin/user';
    private $title  = 'User';
    private $model;

	public function index()
	{
        $data = [
            'title'     => $this->title,
            'link'      => strtolower($this->title),
        ];
        echo view("$this->web/index", $data);
    }
    
    public function create()
    {

    }

    public function store()
    {

    }

    public function edit($id)
    {

    }

    public function update()
    {

    }

    public function delete($id)
    {

    }

    public function destroy()
    {
        
    }
}
