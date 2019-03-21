<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'token',
        'nick'
    ];

    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    public function activeTicket() {
        return $this->tickets()->whereNull('finished_at')->first();
    }
}
