<?php

namespace App\Controllers;

use App\Models\ModelKamar;
use App\Models\ModelDashboard;

class Kamar extends BaseController
{
	public function __construct()
	{
		$this->ModelKamar = new ModelKamar();
		$this->ModelDashboard = new ModelDashboard();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'kamar' => $this->ModelKamar->getDataKamar(),
			'fasilitas' => $this->ModelDashboard->getDataFasilitas()
		];

		return view('kamar', $data);
	}
	public function tambahKamar()
	{
		$data = [
			'id_fasilitas' => $this->request->getPost('fasilitas'),
			'jenis_kamar' => $this->request->getPost('jenis_kamar'),
			'stok' => $this->request->getPost('stok'),
			'harga' => $this->request->getPost('harga')
		];
		$this->ModelKamar->tambahKamar($data);
		session()->setFlashdata('tambah', 'Data berhasil ditambahkan !');
		return redirect()->to(base_url('/kamar'));
	}

	public function editKamar($id_kamar)
	{
		$data = [
			'id_kamar' => $id_kamar,
			'id_fasilitas' => $this->request->getPost('fasilitas'),
			'jenis_kamar' => $this->request->getPost('jenis_kamar'),
			'stok' => $this->request->getPost('stok'),
			'harga' => $this->request->getPost('harga')
		];
		$this->ModelKamar->editKamar($data);
		session()->setFlashdata('edit', 'Data berhasil diedit !');
		return redirect()->to(base_url('/kamar'));
	}
	public function deleteKamar($id_kamar)
	{
		$data = [
			'id_kamar' => $id_kamar
		];
		$this->ModelKamar->deleteKamar($data);
		session()->setFlashdata('delete', 'Data berhasil dihapus !');
		return redirect()->to(base_url('/kamar'));
	}
}
