@extends('layouts.app')

@section('content')

    <div class="container my-5">

        @foreach($tickets as $i => $ticket)
            <div class="alert alert-{{ $i == 0 ? 'success' : 'secondary' }}">
                <h3>{{ ucfirst($ticket->client->nick) }}</h3>
                <br>
                Request was created at {{ $ticket->created_at->format('d. m. Y H:i:s') }}
            </div>
        @endforeach

    </div>
@endsection
