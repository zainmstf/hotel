<?php

namespace App\Controllers;

use App\Models\ModelBooking;
use App\Models\ModelKamar;

class Booking extends BaseController
{
	public function __construct()
	{
		$this->ModelBooking = new ModelBooking();
		$this->ModelKamar = new ModelKamar();
		helper('form');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'booking' => $this->ModelBooking->getDataBooking(),
			'kamar' => $this->ModelKamar->getDataKamar()
		];

		return view('booking', $data);
	}
	public function tambahBooking()
	{
		$data = [
			'id_kamar' => $this->request->getPost('kamar'),
			'nama_customer' => $this->request->getPost('nama_customer'),
			'no_telp' => $this->request->getPost('notelp'),
			'tgl_in' => $this->request->getPost('tgl_check_in'),
			'tgl_out' => $this->request->getPost('tgl_check_out'),
			'pembayaran' => $this->request->getPost('pembayaran'),
			'status' => 'Booked'
		];

		$Stok = $this->request->getPost('stok');
		$kurangStock = $Stok -= 1;
		$stock = [
			'id_kamar' => $this->request->getPost('kamar'),
			'stok' => $kurangStock
		];
		$this->ModelBooking->tambahBooking($data);
		$this->ModelBooking->Stock($stock);
		session()->setFlashdata('tambah', 'Data berhasil ditambahkan !');
		return redirect()->to(base_url('/booking'));
	}

	public function editBooking($id_booking)
	{
		$data = [
			'id_boking' => $id_booking,
			'id_kamar' => $this->request->getPost('kamar'),
			'nama_customer' => $this->request->getPost('nama_customer'),
			'no_telp' => $this->request->getPost('notelp'),
			'tgl_in' => $this->request->getPost('tgl_check_in'),
			'tgl_out' => $this->request->getPost('tgl_check_out'),
			'pembayaran' => $this->request->getPost('pembayaran'),
			'status' => $this->request->getPost('status')
		];
		$Stok = $this->request->getPost('stok');
		if ($data['status'] == 'Selesai') {
			$tambahStock = $Stok += 1;
			$stock = [
				'id_kamar' => $data['id_kamar'],
				'stok' => $tambahStock
			];
			$this->ModelBooking->Stock($stock);
		}
		$this->ModelBooking->editBooking($data);
		session()->setFlashdata('edit', 'Data berhasil diedit !');
		return redirect()->to(base_url('/booking'));
	}
	public function deletebooking($id_booking)
	{
		$data = [
			'id_boking' => $id_booking
		];
		$this->ModelBooking->deletebooking($data);
		session()->setFlashdata('delete', 'Data berhasil dihapus !');
		return redirect()->to(base_url('/booking'));
	}
	public function getStock($id_kamar)
	{
		$data = $this->ModelBooking->getStock($id_kamar);
		foreach ($data as $key => $value) {
			echo '<input type="text" name="stock" class="form-control" value="' . $value['stok'] . '" readonly>
			';
		}
	}
	public function getStockHidden($id_kamar)
	{
		$data = $this->ModelBooking->getStock($id_kamar);
		foreach ($data as $key => $value) {
			echo '<input type="text" name="stock" class="form-control" value="' . $value['stok'] . '" readonly>
			';
		}
	}
}
