<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $allowedFields = ['nama_supplier', 'alamat', 'no_telp', 'email'];

    // Jika Anda membutuhkan relasi dengan tabel lain, tambahkan relasi di sini
    protected $returnType = 'object'; // Ganti dengan 'array' jika diperlukan

    public function getSupplier($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->find($id);
    }
}
