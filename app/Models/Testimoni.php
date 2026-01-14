<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';
    protected $primaryKey = 'testimoni_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public function getRouteKeyName()
    {
        return 'testimoni_id';
    }

    protected $fillable = [
        'user_id',
        'isi_testimoni',
        'status',
        'tanggal_input',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
