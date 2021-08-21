<?php

namespace App\Controllers;

use App\Models\ModelLogin;

class Auth extends BaseController
{
	public function __construct()
	{
		$this->ModelLogin = new ModelLogin();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Login',
		];

		return view('login', $data);
	}
	public function cek_login()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$validasi = $this->ModelLogin->login($username, $password);
		if ($validasi) {
			session()->set('username', $validasi['username']);
			session()->set('password', $validasi['password']);
			return redirect()->to(base_url('/dashboard'));
		} else {
			session()->setFlashdata('pesan', 'Username atau Password Salah !!');
			return redirect()->to(base_url('/'));
		}
	}
	public function logout()
	{
		session()->remove('username');
		session()->remove('password');
		session()->setFlashdata('pesan', 'Logout Success');
		return redirect()->to(base_url('/'));
	}
}
