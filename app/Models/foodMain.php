<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foodMain extends Model
{
    use HasFactory;

    protected $fillable = [
        'IDFoodMain',
        'NamaFoodMain',
        'HargaOriFoodMain',
        'JenisFoodMain',
        'FotoFoodMain',
        'DeskripsiFoodMain',
        'QuantityFoodMain'
    ];

}
