<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Workmanager extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'staff_id', 'number_register', 'number_late'
    ];

    public function staff() {
        return $this->belongsTo('App\Staff', 'staff_id');
    }
}
