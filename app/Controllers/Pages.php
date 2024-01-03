<?php

namespace App\Controllers;

use App\Models\UserModel;

class Pages extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title' => 'Halaman Login',
        ];
        return view('pages/login', $data);
    }

    public function loginPost()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->getDataUsers($username);
        if (!$user) {
            session()->setFlashdata('message', 'infoMessage');
            return redirect()->to('pages');
        }
        foreach ($user as $result) :
            $passdb = $result["password"];
            if (password_verify($password, $passdb) &&  $result["status"] == 1) {
                foreach ($user as $result) :
                    $data = [
                        'id'  => $result["id_pengguna"],
                        'jenisLog' => $result["level"],
                        'username' => $result["username"],
                        'nama' => $result["nama"],
                        'logged_in' => true
                    ];
                    $this->session->set($data);
                    $this->userModel->setStatusOnline(1, $result["id_pengguna"]);
                    return redirect()->to('/Home');
                endforeach;
            } else {
                session()->setFlashdata('message', 'infoMessage');
                return redirect()->to('pages');
            }
        endforeach;
    }

    public function forgetPass()
    {
        $data = [
            'title' => 'Lupa pass',
        ];
        return view('pages/forgetPassword', $data);
    }

    public function forgetPassPost()
    {
        $username = $this->request->getVar('username');
        $noHp = $this->request->getVar('noHp');

        $data = $this->userModel->getDataUsers($username);
        if (!$data) {
            session()->setFlashdata('message', 'infoMessageForgetPass');
            return redirect()->to('Pages/forgetPass');
        }
        $random = rand(10000, 99999);
        foreach ($data as $user) {
            if ($user["username"] == $username && $user["nomor_hp"] == $noHp) {

                $this->userModel->updateOTP($random, $username);
                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'target' => $noHp,
                        'message' => "Ini kode OTP: " . $random . ". Jangan bagikan kepada siapapun!",
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: eoEbr!dL6xtp4P06kuK9'
                    ),
                ));

                $response = curl_exec($curl);
                if (curl_errno($curl)) {
                    $error_msg = curl_error($curl);
                }
                curl_close($curl);
                $data = [
                    'title' => 'Lupa pass',
                ];
                return view('pages/updatePassword', $data);
            } else {
                session()->setFlashdata('message', 'infoMessageForgetPass');
                return redirect()->to('Pages/forgetPass');
            }
        }
    }

    public function updatePassword()
    {
        $username = $this->request->getVar('username');
        $otp = $this->request->getVar('otp');

        $newPassword = password_hash($this->request->getVar('newPassword'), PASSWORD_DEFAULT);

        $data = $this->userModel->getDataUsers($username);
        if ($data) {
            foreach ($data as $user) {
                if ($otp == $user['otp']) {
                    if ($this->userModel->updatePassUser($newPassword, $username)) {
                        // $this->userModel->deleteOtp($username);
                        session()->setFlashdata('message', 'infoMessageForgetPass3');
                        return redirect()->to('Pages');
                    }
                } else {
                    // masih error
                    session()->setFlashdata('message', 'infoMessageForgetPass2');
                    return redirect()->to('Pages/forgetPass');
                }
            }
        } else {
            // masih error
            session()->setFlashdata('message', 'infoMessageForgetPass2');
            return redirect()->to('Pages/forgetPass');
        }
    }

    public function logout()
    {
        if ($this->userModel->setStatusOnline('0', $this->session->get('id'))) {
            session()->destroy();
            return redirect()->to('/Pages');
        }
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'title2' => 'Halaman About',
            'jenisLogin' => $this->session->get('jenisLog'),
            'activeAbout' => 'active',
            'userLogin' => $this->userModel->getDataUsersById($this->session->get('id'))
        ];
        return view('pages/about', $data);
    }
}
