<?php

namespace App\Models;

use CodeIgniter\Model;

class MerekModel extends Model
{
    protected $table = 'merek';
    protected $primaryKey = 'id_merek';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_merek', 'deskripsi_merek'];


    public function getAllMerek()
    {
        return $this->findAll();
    }
}
