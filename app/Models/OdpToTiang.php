<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OdpToTiang extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'tiang_id',
        'odp_id',
        'distance',
    ];

    public function tiang()
    {
        return $this->belongsTo(Tiang::class);
    }

    public function odp()
    {
        return $this->belongsTo(Odp::class);
    }
}
