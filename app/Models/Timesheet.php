<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Timesheet extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'staffId', 'difficulty', 'workNextDay', 'approve',
        ];

    public function staff() {
        return $this->belongsTo('App\Models\Staff', 'staffId');
    }

    public function task() {
        return $this->hasMany('App\Models\Task', 'timesheetId');
    }


}
