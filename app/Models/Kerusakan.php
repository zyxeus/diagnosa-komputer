<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
  protected $table = 'kerusakan';

    protected $primaryKey = 'kode_kerusakan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_kerusakan',
        'nama_kerusakan',
        'deskripsi',
        'gambar',
    ];

    public function solusis()
    {
        return $this->hasMany(Solusi::class, 'kode_kerusakan', 'kode_kerusakan');
    }

    public function riwayat()
    {
        return $this->hasMany(Riwayat::class, 'kode_kerusakan', 'kode_kerusakan');
    }


}
