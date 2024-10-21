<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiang extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'branch',
        'jenis_tiang',
        'milik',
        'nama_tiang',
        'lat',
        'lng',
        'keterangan',
    ];

    public function odp_to_tiang()
    {
        return $this->hasMany(OdpToTiang::class);
    }
}
