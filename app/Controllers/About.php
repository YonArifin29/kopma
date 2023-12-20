<?php

namespace App\Controllers;

class About extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title' => 'About',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeAbout' => 'active' 
        ];
        return view('about/index', $data);
    }
}
