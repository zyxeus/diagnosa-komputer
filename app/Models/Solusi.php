<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kerusakan;

class Solusi extends Model
{
    use HasFactory;

    protected $table = 'solusi';

    protected $primaryKey = 'kode_solusi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_solusi',
        'kode_kerusakan',
        'deskripsi_solusi'
    ];

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class, 'kode_kerusakan', 'kode_kerusakan');
    }
}
