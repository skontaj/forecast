<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Forecast;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
    ];

    public function forecasts()
    {
        return $this->hasMany(Forecast::class)->orderBy('date'); // relacija jedan prema više, jer ima više prognoza za jedan grad
    }

}
