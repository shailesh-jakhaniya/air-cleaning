<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DryerVents extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dryer_vent_exit_point',
        'price',
        'created_by',
        'updated_by'
    ];
}
