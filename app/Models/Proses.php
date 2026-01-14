<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proses extends Model
{
    protected $table = 'proses';
    protected $primaryKey = 'proses_id';
    
    public function getRouteKeyName()
    {
        return 'proses_id';
    }
    
    protected $fillable = [
        'kode_gejala',
        'kode_kerusakan',
        'nilai_cf',
    ];

    public $incrementing = true;
    protected $keyType = 'int';

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala', 'kode_gejala');
    }

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kode_kerusakan', 'kode_kerusakan');
    }
}
