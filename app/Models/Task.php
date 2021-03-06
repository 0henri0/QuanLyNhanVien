<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Task extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'timesheet_id', 'content', 'useTime',
    ];

    public function timesheet() {
        return $this->belongsTo('App\Models\Timesheet', 'timesheet_id');
    }

}
