<?php

namespace App\Models;

use CodeIgniter\Model;

class PembelianModel extends Model
{
   protected $table = 'pembelian';
   protected $primaryKey = 'id_pembelian';
   protected $allowedFields = ['id_supplier', 'kd_brg', 'tgl_pembelian', 'tgl_kadaluarsa_pembelian', 'jumlah_pembelian', 'harga_satuan', 'total_harga', 'status'];

   public function getListPembelianBarang($currentPage)
   {
      return $this->select('pembelian.id_pembelian, pembelian.tgl_pembelian,pembelian.tgl_kadaluarsa_pembelian, pembelian.jumlah_pembelian, pembelian.status, supplier.nama_supplier, barang.kd_brg, barang.nama_brg, barang.gambar_brg, merek.nama_merek, stok.jumlah_stok')
         ->join('supplier', 'supplier.id_supplier = pembelian.id_supplier')
         ->join('barang', 'barang.kd_brg = pembelian.kd_brg')
         ->join('stok', 'stok.id_stok = pembelian.id_stok')
         ->join('merek', 'merek.id_merek = pembelian.id_merek')
         ->orderBy('pembelian.tgl_pembelian', 'DESC')
         ->paginate($currentPage, 'retur_pembelian');
   }

   public function getDetailPembelian($id_pembelian)
   {
      return $this->select('pembelian.id_pembelian, pembelian.tgl_pembelian, pembelian.tgl_kadaluarsa_pembelian, pembelian.jumlah_pembelian, pembelian.status, supplier.id_supplier, supplier.nama_supplier, barang.kd_brg, barang.nama_brg, barang.gambar_brg, merek.nama_merek, stok.id_stok, stok.tgl_kadaluarsa, stok.jumlah_stok, stok.jumlah_stok')
         ->join('supplier', 'supplier.id_supplier = pembelian.id_supplier')
         ->join('barang', 'barang.kd_brg = pembelian.kd_brg')
         ->join('stok', 'stok.id_stok = pembelian.id_stok')
         ->join('merek', 'merek.id_merek = pembelian.id_merek')
         ->where('id_pembelian', $id_pembelian)
         ->first();
   }

}
