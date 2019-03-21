<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $token = Cookie::get('client');


        $client = null;
        if ($token !== null) {
            $client = Client::where('token', $token)->first();
        }

        if (!$client) return abort(401);

        $client->tickets()->create();

        Session::flash('status_success', 'Ticket successfully created!');

        return redirect(action('ClientController@home'));

    }
}
