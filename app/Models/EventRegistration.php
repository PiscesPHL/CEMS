<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    protected $table = "event_registrations";
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('users', 'user_id');
    }

    public function event()
    {
        return $this->belongsTo('events', 'event_id');
    }
}
