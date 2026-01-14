<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kerusakan;

class Riwayat extends Model
{
    protected $table = 'riwayat';
    protected $primaryKey = 'riwayat_id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function getRouteKeyName()
    {
        return 'riwayat_id';
    }

    protected $fillable = [
        'user_id',
        'hasil_diagnosa',
        'solusi_diagnosa',
        'jumlah_solusi',
        'tanggal_diagnosa',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kode_kerusakan', 'kode_kerusakan');
    }
}
