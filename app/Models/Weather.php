<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Weather extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        'city_id',
        'temperature',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
}
