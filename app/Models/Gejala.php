<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $table = 'gejala';

    protected $primaryKey = 'kode_gejala';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['kode_gejala', 'nama_gejala', 'bobot_cf'];
}
