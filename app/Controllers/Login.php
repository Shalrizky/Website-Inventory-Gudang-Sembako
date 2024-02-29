<?php

namespace App\Controllers;

use App\Models\AdminModel;
use Config\Validation;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('index', $data);
    }

    public function authenticate()
    {
        $validation = $this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ]);

        if (!$validation) {
            return redirect()->to('login')->withInput();
        }

        $adminModel = new AdminModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $cek = $adminModel->cekLogin($username, $password);

        if ($cek) {
            session()->set('username', $cek['username']);
            return redirect()->to('Dashboard');
        } else {
            session()->setFlashdata('pesan', 'Username atau Password salah');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('index');
    }
}