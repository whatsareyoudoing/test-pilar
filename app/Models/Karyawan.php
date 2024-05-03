<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = ['nama_karyawan', 'alamat_karyawan'];

    public function getNama()
    {
        return $this->nama_karyawan;
    }

    public function getAlamat()
    {
        return $this->alamat_karyawan;
    }

    // Create operation
    public static function createKaryawan($searchDataata,$data)
    {
        return static::updateOrCreate($searchDataata,$data);
    }

    // Read operation
    public static function getKaryawan($id)
    {
        return static::findOrFail($id);
    }

    // Update operation
    public function updateKaryawan($data)
    {
        return $this->update($data);
    }

    // Delete operation
    public function deleteKaryawan()
    {
        return $this->delete();
    }
}
