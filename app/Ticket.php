<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $dates = ['created_at'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

}
