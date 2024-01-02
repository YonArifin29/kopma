<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\libraries\jquery;

class Home extends BaseController
{
    protected $session;
    protected $userModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/Home/homePage');
        } else {
            $data = [
                'title' => 'Beranda',
                'title2' => 'Halaman Beranda',
                'jenisLogin' => $this->session->get('jenisLog'),
                'activeHome' => 'active',
                'userLogin' => $this->userModel->getDataUsersById($this->session->get('id')),
                'getDataUserByOnlineStatus' => $this->userModel->getDataUsersByOnStatus()
            ];
            return view('home/index', $data);
        }
    }

    public function homePage()
    {
        $data = [
            'title' => 'Home Page'
        ];
        return view('home/homePage', $data);
    }
}
