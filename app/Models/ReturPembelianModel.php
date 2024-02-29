<?php

namespace App\Models;

use CodeIgniter\Model;

class ReturPembelianModel extends Model
{
   protected $table = 'retur_pembelian';
   protected $primaryKey = 'id_retur_pembelian';
   protected $useTimestamps = true;
   protected $createdField  = 'created_at';
   protected $updatedField  = 'updated_at';
   protected $allowedFields = ['id_pembelian', 'id_supplier', 'kd_brg', 'id_stok',  'created_at', 'updated_at', 'jumlah_retur', 'keterangan', 'status_retur'];

   public function getListReturPembelian($currentPage)
   {
       return $this->select('retur_pembelian.id_retur_pembelian, retur_pembelian.kd_brg, retur_pembelian.created_at, retur_pembelian.updated_at,  retur_pembelian.jumlah_retur, retur_pembelian.keterangan, retur_pembelian.status_retur, pembelian.id_pembelian, pembelian.tgl_pembelian, pembelian.tgl_kadaluarsa_pembelian, pembelian.jumlah_pembelian, pembelian.status, supplier.nama_supplier, barang.nama_brg, barang.gambar_brg, stok.jumlah_stok')
           ->join('pembelian', 'pembelian.id_pembelian = retur_pembelian.id_pembelian')
           ->join('supplier', 'supplier.id_supplier = retur_pembelian.id_supplier')
           ->join('barang', 'barang.kd_brg = retur_pembelian.kd_brg')
           ->join('stok', 'stok.id_stok = retur_pembelian.id_stok')
           ->orderBy('retur_pembelian.created_at', 'DESC')
           ->paginate($currentPage, 'retur_pembelian'); 
   }
   

   public function getReturPembelianById($id_retur_pembelian)
   {
      return $this->select('retur_pembelian.id_retur_pembelian, retur_pembelian.kd_brg, retur_pembelian.created_at, retur_pembelian.updated_at,  retur_pembelian.jumlah_retur, retur_pembelian.keterangan, pembelian.id_pembelian, pembelian.tgl_pembelian, pembelian.tgl_kadaluarsa_pembelian, pembelian.jumlah_pembelian, pembelian.status, supplier.nama_supplier, barang.nama_brg, barang.gambar_brg, stok.jumlah_stok')
         ->join('pembelian', 'pembelian.id_pembelian = retur_pembelian.id_pembelian')
         ->join('supplier', 'supplier.id_supplier = retur_pembelian.id_supplier')
         ->join('barang', 'barang.kd_brg = retur_pembelian.kd_brg')
         ->join('stok', 'stok.id_stok = retur_pembelian.id_stok')
         ->where('id_retur_pembelian', $id_retur_pembelian)
         ->first();
   }

   
}
