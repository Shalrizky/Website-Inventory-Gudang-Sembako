<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $allowedFields = ['id_pelanggan', 'kd_brg', 'id_stok', 'id_merek', 'jumlah_barang'];

    public function getPengeluaranDetail($id_pelanggan)
    {
        $result = $this->select('pengeluaran.*, barang.nama_brg, merek.nama_merek, stok.jumlah_stok')
            ->join('barang', 'barang.kd_brg = pengeluaran.kd_brg')
            ->join('merek', 'merek.id_merek = pengeluaran.id_merek')
            ->join('stok', 'stok.id_stok = pengeluaran.id_stok')
            ->where('pengeluaran.id_pelanggan', $id_pelanggan)
            ->findAll();
    
        return $result;
    }

}