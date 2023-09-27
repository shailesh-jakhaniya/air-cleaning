<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AirDucts extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'num_of_furnace',
        'furnace_loc_sidebyside',
        'furnace_loc_different',
        'square_footage_min',
        'square_footage_max',
        'final_price',
        'created_by',
        'updated_by'
    ];
}
