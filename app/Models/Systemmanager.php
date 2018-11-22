<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Systemmanager extends Model
{
    use Notifiable;

    protected $table = 'systemmanagers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_timesheet', 'end_timesheet',
    ];

}
