<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
   protected $table = 'barang';
   protected $primaryKey = 'kd_brg';
   protected $allowedFields = ['kd_brg', 'nama_brg', 'gambar_brg', 'tgl_kadaluarsa'];

   public function getBarangDashboard()
   {
      return $this->select('barang.kd_brg, barang.nama_brg, barang.gambar_brg, merek.nama_merek, stok.status_stok, stok.jumlah_stok, stok.updated_at, stok.tgl_kadaluarsa')
         ->join('merek', 'barang.id_merek = merek.id_merek')
         ->join('stok', 'barang.kd_brg = stok.kd_brg')
         ->findAll();
   }
}
