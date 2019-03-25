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

    public function scopeActive($query)
    {
        return $query->whereNull('finished_at');
    }


    public function scopeFinished($query)
    {
        return $query->whereNotNull('finished_at');
    }

}
