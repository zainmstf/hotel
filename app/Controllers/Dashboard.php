<?php

namespace App\Controllers;

use App\Models\ModelDashboard;

class Dashboard extends BaseController
{
	public function __construct()
	{
		$this->ModelDashboard = new ModelDashboard();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'fasilitas' => $this->ModelDashboard->getDataFasilitas()
		];

		return view('dashboard', $data);
	}
	public function tambahFasilitas()
	{
		$data = [
			'fasilitas' => $this->request->getPost('fasilitas')
		];
		$this->ModelDashboard->tambahFasilitas($data);
		session()->setFlashdata('tambah', 'Data berhasil ditambahkan !');
		return redirect()->to(base_url('/dashboard'));
	}

	public function editFasilitas($id_fasilitas)
	{
		$data = [
			'id_fasilitas' => $id_fasilitas,
			'fasilitas' => $this->request->getPost('fasilitas')
		];
		$this->ModelDashboard->editFasilitas($data);
		session()->setFlashdata('edit', 'Data berhasil diedit !');
		return redirect()->to(base_url('/dashboard'));
	}
	public function deleteFasilitas($id_fasilitas)
	{
		$data = [
			'id_fasilitas' => $id_fasilitas
		];
		$this->ModelDashboard->deleteFasilitas($data);
		session()->setFlashdata('delete', 'Data berhasil dihapus !');
		return redirect()->to(base_url('/dashboard'));
	}
}
