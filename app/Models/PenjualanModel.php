<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanModel extends Model
{
   protected $table = 'penjualan';
   protected $primaryKey = 'id_pelanggan';
   protected $allowedFields = [
      'no_ref', 'tgl_pemesanan', 'tgl_pengajuan', 'jumlah_brg_dipesan', 'total_harga', 'status'
   ];

   public function getListPenjualan($currentPage)
   {
       return $this->orderBy('tgl_pengajuan', 'DESC')->paginate($currentPage, 'penjualan');
   }
}
