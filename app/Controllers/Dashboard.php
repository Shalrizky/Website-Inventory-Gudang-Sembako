<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\StokModel;
use App\Models\ReturPembelianModel;
use App\Models\PengeluaranModel;
use App\Models\PenjualanModel;
use App\Models\ReturPenjualanModel;

class Dashboard extends BaseController
{

    protected $barangModel;
    protected $returPembelianModel;
    protected $pembelianModel;
    protected $pengeluaranModel;
    protected $penjualanModel;
    protected $stokModel;
    protected $returPenjualanModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->returPembelianModel = new ReturPembelianModel();
        $this->pembelianModel = new PembelianModel();
        $this->stokModel = new StokModel();
        $this->pengeluaranModel = new PengeluaranModel();
        $this->penjualanModel = new PenjualanModel();
        $this->returPenjualanModel = new ReturPenjualanModel();
    }

    public function index_dashboard()
    {
        $barang = $this->barangModel->getBarangDashboard();
        $alertMendekatiKadaluarsa = [];
        $alertSudahKadaluarsa = [];

        foreach ($barang as $produk) {
            if ($produk['jumlah_stok'] > 0) {
                $tglKadaluarsa = strtotime($produk['tgl_kadaluarsa']);
                $waktuSekarang = strtotime('now');
                $selisihBulan = floor(($tglKadaluarsa - $waktuSekarang) / (30 * 24 * 60 * 60));

                if ($selisihBulan <= 0) {
                    $alertSudahKadaluarsa[] = [
                        'nama_brg' => $produk['nama_brg'],
                        'pesan' => "Sudah kadaluarsa"
                    ];
                } elseif ($selisihBulan > 0 && $selisihBulan <= 3) {
                    $alertMendekatiKadaluarsa[] = [
                        'nama_brg' => $produk['nama_brg'],
                        'pesan' => "Akan kadaluarsa dalam {$selisihBulan} bulan"
                    ];
                }
            }
        }

        $data = [
            'title' => 'Dashboard',
            'updated_at' => date('Y-m-d'),
            'barang' => $barang,
            'alertMendekatiKadaluarsa' => $alertMendekatiKadaluarsa,
            'alertSudahKadaluarsa' => $alertSudahKadaluarsa,
        ];

        return view('pages/dashboard_inventory', $data);
    }

    // Penerimaan Barang Function
    public function penerimaan_barang($id_pembelian = null)
    {
        $model = $this->pembelianModel;

        $currentPage = $this->request->getVar('pembelian') ? $this->request->getVar('pembelian') : 5;
        $pembelianBarang = $model->getListPembelianBarang($currentPage);

        $pager = $model->pager;

        $detailPembelian = null;
        if (!is_null($id_pembelian)) {
            $detailPembelian = $this->pembelianModel->getDetailPembelian($id_pembelian);
        }

        $data = [
            'pembelianBarang' => $pembelianBarang,
            'detailPembelian' => $detailPembelian,
            'title' => 'Penerimaan Barang',
            'pager' => $pager,
        ];

        return view('pages/v_penerimaan_barang', $data);
    }
    // End Penerimaan Barang Function

    // Approve Pembelian Function
    public function approve_pembelian($id_pembelian)
    {
        if (empty($id_pembelian)) {
            return redirect()->back()->with('error', 'ID Pembelian tidak valid.');
        }

        $pembelian = $this->pembelianModel->getDetailPembelian($id_pembelian);

        if (empty($pembelian)) {
            return redirect()->back()->with('error', 'Data pembelian tidak ditemukan.');
        }

        $this->stokModel->updateStokBarang($pembelian['kd_brg'], $pembelian['jumlah_pembelian'], $pembelian['tgl_kadaluarsa_pembelian']);

        $this->pembelianModel->update($id_pembelian, ['status' => 'Stock In']);

        session()->setFlashdata('success', true);

        return redirect()->to('Penerimaan_Barang');
    }
    // End Approve Pembelian Function

    // Void Pembelian Function
    public function void_pembelian($id_pembelian)
    {
        $pembelian = $this->pembelianModel->getDetailPembelian($id_pembelian);
        $validationRules = [
            'jumlah_retur' => [
                'label' => 'Jumlah Retur',
                'rules' => 'required|numeric|greater_than[0]|less_than_equal_to[' . $pembelian['jumlah_pembelian'] . ']',
                'errors' => [
                    'greater_than' => 'Jumlah Retur tidak boleh melebihi jumlah pembelian.',
                    'less_than_equal_to' => 'Jumlah Retur tidak boleh melebihi jumlah pembelian.'
                ],
            ],
            'keterangan' => 'required|max_length[200]',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        if (empty($pembelian)) {
            return redirect()->back()->with('error', 'Data pembelian tidak ditemukan.');
        }

        $data = [
            'id_pembelian' => $pembelian['id_pembelian'],
            'id_supplier' => $pembelian['id_supplier'],
            'kd_brg' => $pembelian['kd_brg'],
            'id_stok' => $pembelian['id_stok'],
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
            'jumlah_retur' => $this->request->getPost('jumlah_retur'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        $this->returPembelianModel->insert($data);

        $this->stokModel->updateStokBarang($pembelian['kd_brg'], $pembelian['jumlah_pembelian'], $pembelian['tgl_kadaluarsa_pembelian']);

        $this->pembelianModel->update($id_pembelian, ['status' => 'Perlu Retur']);

        session()->setFlashdata('successVoid', true);


        return redirect()->to('Penerimaan_Barang');
    }
    // End Void Pembelian Function

    // Retur Pembelian Function
    public function retur_pembelian()
    {
        $model = $this->returPembelianModel;

        $currentPage = $this->request->getVar('retur_pembelian') ? $this->request->getVar('retur_pembelian') : 5;

        $returPembelian = $model->getListReturPembelian($currentPage);

        $pager = $model->pager;

        $data = [
            'title' => 'Retur Pembelian',
            'returPembelian' => $returPembelian,
            'pager' => $pager,
        ];

        return view('pages/v_retur_pembelian', $data);
    }

    // Proses Retur Function
    public function proses_retur($id_retur_pembelian)
    {
        $retur = $this->returPembelianModel->getReturPembelianById($id_retur_pembelian);

        if (empty($retur)) {
            return redirect()->to('Retur_Pembelian')->with('error', 'Return not found.');
        }

        $this->stokModel->updateStokReturPembelian($retur['kd_brg'], $retur['jumlah_retur'], $retur['jumlah_retur']);

        $this->returPembelianModel->update($id_retur_pembelian, ['status_retur' => 'Stock Out']);
        $id_pembelian = $retur['id_pembelian'];

        $this->pembelianModel->update($id_pembelian, ['status' => 'Stock Out']);

        return redirect()->to('Retur_Pembelian')->with('successRetur', 'Return processed successfully.');
    }
    // End Proses Retur Function

    public function pengeluaran_barang($id_pelanggan = null)
    {
        $model = $this->penjualanModel;
        $currentPage = $this->request->getVar('penjualan') ? $this->request->getVar('penjualan') : 5;
        $penjualanBarang = $model->getListPenjualan($currentPage);
        $pager = $model->pager;

        $detailPengeluaran = [];

        foreach ($penjualanBarang as $penjualan) {
            $idPelanggan = $id_pelanggan ?? $penjualan['id_pelanggan'];
            $detailPengeluaran[$idPelanggan] = $this->pengeluaranModel->getPengeluaranDetail($idPelanggan);
        }

        $data = [
            'penjualanBarang' => $penjualanBarang,
            'detailPengeluaran' => $detailPengeluaran,
            'title' => 'Pengeluaran Barang',
            'pager' => $pager,
        ];

        return view('pages/v_pengeluaran_barang', $data);
    }

    public function approve_pengeluaran($id_pelanggan)
    {
        if (empty($id_pelanggan)) {
            return redirect()->back()->with('error', 'ID Pelanggan tidak valid.');
        }

        // Ambil data pengeluaran berdasarkan ID Pelanggan
        $pengeluaranList = $this->pengeluaranModel->getPengeluaranDetail($id_pelanggan);

        if (empty($pengeluaranList)) {
            return redirect()->back()->with('error', 'Data pengeluaran tidak ditemukan.');
        }

        $this->stokModel->updateStokPengeluaran($pengeluaranList);

        $this->penjualanModel->update($id_pelanggan, ['status' => 'Stock Out']);

        return redirect()->to('Pengeluaran_Barang')->with('successPengeluaran', 'Return processed successfully.');
    }

    // Retur Pembelian Function
    public function retur_penjualan()
    {
        $model = $this->returPembelianModel;

        $currentPage = $this->request->getVar('page_retur_penjualan') ? $this->request->getVar('page_retur_penjualan') : 1;

        $returPenjualan = $this->returPenjualanModel->getListReturPenjualan($currentPage);
        $pager = $model->pager;
        $detailPenjualan = [];

        foreach ($returPenjualan as $retur) {
            $idPelanggan = $id_pelanggan ?? $retur['id_pelanggan'];
            $detailPenjualan[$idPelanggan] = $this->returPenjualanModel->getPenjualanDetail($idPelanggan);
        }

        $data = [
            'title' => 'Retur Penjualan',
            'returPenjualan' => $returPenjualan,
            'detailPenjualan' =>   $detailPenjualan,
            'pager' => $pager,
        ];

        return view('pages/v_retur_penjualan', $data);
    }


    public function proses_retur_penjualan($id_retur_penjualan)
    {
        // Mengambil data retur penjualan berdasarkan ID
        $retur = $this->returPenjualanModel->find($id_retur_penjualan);

        if (empty($retur)) {
            return redirect()->back()->with('error', 'Data retur penjualan tidak ditemukan.');
        }

        // Mendapatkan jumlah retur
        $this->stokModel->updateStokReturPenjualan($retur['kd_brg'], $retur['jumlah_retur'], $retur['jumlah_retur']);

        $this->returPenjualanModel->update($id_retur_penjualan, ['status_retur' => 'Stock In']);


        return redirect()->to('Retur_Penjualan')->with('successReturPenjualan', 'Return processed successfully.');
    }
    // End Proses Retur Penjualan Function


}
