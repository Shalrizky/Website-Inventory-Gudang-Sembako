<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
{
    protected $table = 'stok';
    protected $primaryKey = 'kd_brg';
    protected $useTimestamps = true;
    protected $allowedFields = ['kd_brg', 'status_stok', 'jumlah_stok', 'tgl_kadaluarsa', 'updated_at'];
    protected $updatedField = 'updated_at';


    public function updateStokBarang($kd_brg, $jumlah_pembelian, $tgl_kadaluarsa_pembelian)
    {
        $barang = $this->find($kd_brg);

        if (empty($barang)) {
            return;
        }

        $newStok = $barang['jumlah_stok'] + $jumlah_pembelian;

        $tgl_kadaluarsa = $tgl_kadaluarsa_pembelian;
        $this->update($kd_brg, [
            'jumlah_stok' => $newStok,
            'tgl_kadaluarsa' => $tgl_kadaluarsa,
            'updated_at' => date('Y-m-d'),
        ]);

        $status = ($newStok <= 0) ? 'Habis' : (($newStok <= 20) ? 'Kurang' : 'Banyak');
        $this->update($kd_brg, ['status_stok' => $status]);
    }

    public function updateStokReturPembelian($kd_brg, $jumlah_retur)
    {
        $barang = $this->find($kd_brg);

        if (empty($barang)) {
            return;
        }

        $newStok = $barang['jumlah_stok'] - $jumlah_retur;

        $this->update($kd_brg, [
            'jumlah_stok' => $newStok,
            'updated_at' => date('Y-m-d'),
        ]);

        $status = ($newStok <= 0) ? 'Habis' : (($newStok <= 20) ? 'Kurang' : 'Banyak');
        $this->update($kd_brg, ['status_stok' => $status]);
    }

    public function updateStokPengeluaran($barangList)
    {
        foreach ($barangList as $barang) {
            $kd_brg = $barang['kd_brg'];
            $jumlah_barang = $barang['jumlah_barang'];

            // Ambil data barang dari database
            $existingBarang = $this->find($kd_brg);

            if (!empty($existingBarang)) {
                $newStok = $existingBarang['jumlah_stok'] - $jumlah_barang;

                // Update stok dan status_stok
                $this->update($kd_brg, [
                    'jumlah_stok' => $newStok,
                    'status_stok' => ($newStok <= 0) ? 'Habis' : (($newStok <= 20) ? 'Kurang' : 'Banyak'),
                ]);
            }
        }
    }

    public function updateStokReturPenjualan($kd_brg, $jumlah_retur)
    {
        $barang = $this->find($kd_brg);

        if (empty($barang)) {
            return;
        }

        $newStok = $barang['jumlah_stok'] - $jumlah_retur;

        $this->update($kd_brg, [
            'jumlah_stok' => $newStok,
            'updated_at' => date('Y-m-d'),
        ]);

        $status = ($newStok <= 0) ? 'Habis' : (($newStok <= 20) ? 'Kurang' : 'Banyak');
        $this->update($kd_brg, ['status_stok' => $status]);
    }
}
