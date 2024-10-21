<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Odp extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'code',
        'lat',
        'lng',
    ];

    public function odp_to_tiang()
    {
        return $this->hasMany(OdpToTiang::class);
    }
}
