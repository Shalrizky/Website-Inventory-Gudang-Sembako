<?php

namespace App\Models;

use CodeIgniter\Model;

class ReturPenjualanModel extends Model
{
   protected $table = 'retur_penjualan';
   protected $primaryKey = 'id_retur_penjualan';
   protected $useTimestamps = true;
   protected $createdField  = 'created_at';
   protected $updatedField  = 'updated_at';
   protected $allowedFields = [
      'id_pelanggan', 'id_pengeluaran', 'id_stok', 'kd_brg', 'jumlah_retur', 'status_retur', 'keterangan'
   ];

   public function getListReturPenjualan($currentPage)
   {
      // Adjust the join and select statements according to your database schema
      return $this->select('retur_penjualan.*, penjualan.no_ref, penjualan.nama_pelanggan, penjualan.tgl_pengajuan, penjualan.jumlah_brg_dipesan, pengeluaran.jumlah_barang, barang.nama_brg, stok.jumlah_stok')
         ->join('penjualan', 'penjualan.id_pelanggan = retur_penjualan.id_pelanggan')
         ->join('pengeluaran', 'pengeluaran.id_pengeluaran = retur_penjualan.id_pengeluaran')
         ->join('barang', 'barang.kd_brg = retur_penjualan.kd_brg')
         ->join('stok', 'stok.id_stok = retur_penjualan.id_stok')
         ->orderBy('retur_penjualan.created_at', 'DESC')
         ->paginate($currentPage, 'retur_penjualan');
   }

   public function getReturPenjualanById($id_retur_penjualan)
   {
      // Adjust the join and select statements according to your database schema
      return $this->asArray()
         ->where(['id_retur_penjualan' => $id_retur_penjualan])
         ->first();
   }

   public function getPenjualanDetail($id_pelanggan)
   {
      $result = $this->select('retur_penjualan.*, penjualan.no_ref, penjualan.nama_pelanggan, penjualan.tgl_pengajuan, penjualan.jumlah_brg_dipesan, pengeluaran.jumlah_barang, barang.nama_brg, stok.jumlah_stok')
         ->join('penjualan', 'penjualan.id_pelanggan = retur_penjualan.id_pelanggan')
         ->join('pengeluaran', 'pengeluaran.id_pengeluaran = retur_penjualan.id_pengeluaran')
         ->join('barang', 'barang.kd_brg = retur_penjualan.kd_brg')
         ->join('stok', 'stok.id_stok = retur_penjualan.id_stok')
         ->where('penjualan.id_pelanggan', $id_pelanggan)
         ->findAll();

      return $result;
   }


   // Add any additional methods you need to interact with the retur_penjualan data here
}
