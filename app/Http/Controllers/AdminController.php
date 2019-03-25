<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $finished = Ticket::finished()->get();
        $tickets = Ticket::active()->get();

        return view('tickets', compact(['finished', 'tickets']));

    }

    public function finish($id)
    {
        $ticket = Ticket::findOrFail($id);

        $ticket->finished_at = Carbon::now();
        $ticket->save();

        return redirect(action('AdminController@index'));
    }
}
