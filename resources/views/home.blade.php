@extends('layouts.app')

<body style="background-image: url(img/book5.jpg); "  >
    
</body>


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    @if(Auth::check() && Auth::user()->level == 'admin')
                    <h1>Anda Adalah Admin</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
