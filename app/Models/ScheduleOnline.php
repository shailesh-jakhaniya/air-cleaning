<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleOnline extends Model
{
    use HasFactory;

    public $table = 'schedule_online';

    public $fillable = [
        'service_need',
        'first_name',
        'last_name',
        'zip',
        'city',
        'phone_no',
        'address',
        'email',
        'description',
        'reschedule',
        'number_of_furance',
        'location_of_furance',
        'dryer_vent_cleaning',
        'dryer_vent_exit_point'
    ];
}
