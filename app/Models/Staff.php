<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;
    protected $table = 'staffs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usename', 'email', 'password','leader_id', 'avatar', 'decription',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function leader() {
        return $this->hasMany('App\Models\Staff', 'leader_id');
    }

    public function staff() {
        return $this->belongsTo('App\Models\Staff', 'leader_id','id');
    }

    public function workmanager() {
        return $this->hasMany('App\Models\workmanager', 'staff_id');
    }

    public function timesheet() {
        return $this->hasMany('App\Models\Timesheet', 'staff_id');
    }


}
