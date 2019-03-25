@extends('layouts.app')

@section('content')

    <div class="container my-5">

        @foreach($tickets as $i => $ticket)
            <div class="alert alert-{{ $i == 0 ? 'success' : 'secondary' }}">
                <h3>{{ ucfirst($ticket->client->nick) }}</h3>
                <div class="d-lg-flex justify-content-around">
                    <div>
                        Request was created at  {{ $ticket->created_at->format('d. m. Y H:i:s') }}
                    </div>


                    <div>
                        <form action="{{ action('AdminController@finish', [$ticket->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Finished</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
