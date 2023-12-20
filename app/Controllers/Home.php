<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
         if (!session()->get('logged_in'))
        {
            return redirect()->to('/Home/homePage');
        } else {
            $data = [
                'title' => 'Beranda',
                'jenisLogin' => $this->session->get('jenisLog'),
                'activeHome' => 'active' 
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
