<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendances";
    protected $guarded = [];

    public function event_registration()
    {
        return $this->belongsTo('event_registrations', 'registration_id');
    }
}
