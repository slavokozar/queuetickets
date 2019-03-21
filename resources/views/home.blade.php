@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="content">
            @if (session('status_success'))
                <div class="alert alert-success" role="alert">
                    {{ session('status_success') }}
                </div>
            @endif
            @if (session('status_error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('status_error') }}
                </div>
            @endif

            @if(isset($client))
                <h1 class="mb-5">Hi {{ ucfirst($client->nick) }}</h1>

                @if($client->activeTicket())
                    <div class="alert alert-success">
                        <h3>You request for suport is waiting ...</h3>
                        <br>
                        Request was created at {{ $client->activeTicket()->created_at->format('d. m. Y H:i:s') }}
                    </div>



                @else

                    <form action="{{ action('TicketController@store') }}" method="post">
                        @csrf
                        <button class="btn btn-primary btn-lg" type="submit">
                            Request support
                        </button>
                    </form>
                @endif

            @else
                <h1>Support tickets</h1>
                <h3>Apply for support with this amazing app!</h3>
                <p>Start by choosing your nick ;)</p>

                <form action="{{ action('ClientController@store') }}" method="post">
                    @csrf
                    <div class="input-group ">

                        <input class="form-control form-control-lg {{ $errors->has('nick') ? 'is-invalid' : '' }}"
                               type="text" name="nick" placeholder="Your Nick">
                        <div class="input-group-append">
                            <button class="btn {{ $errors->has('nick') ? 'btn-danger' : 'btn-primary' }}" type="submit">
                                Start!
                            </button>
                        </div>
                    </div>
                    @if($errors->has('nick'))
                        <div class="text-danger">
                            Please provide a valid nick.
                        </div>
                    @endif
                </form>

            @endif
        </div>
    </div>
@endsection
