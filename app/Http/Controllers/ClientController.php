<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class ClientController extends Controller
{
    public function home(){
        $token = Cookie::get('client');

        $client = null;
        if($token !== null){
            $client = Client::where('token', $token)->first();

            return view('welcome', compact(['client']));
        }

        return view('welcome');
    }

    public function store(Request $request){

        $data = $request->validate([
            'nick' => 'required|max:255',
        ]);

        $data['token'] = md5(uniqid().time().json_encode($data));

        $client = Client::create($data);

        $response = new Response( view('welcome', compact(['client'])));
        $response->withCookie(cookie('client', $client->token, 60 * 24 * 7));
        return $response;
    }
}
