@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Detail Buku</title>
</head>
<body>
    <section id="album" class="py-1 text-center bg-light">
        <div class="container">
            <h2> Buku {{ $buku->judul }} </h2>
            <hr>
            <div class="row">
                @foreach ($dataGaleri as $data)
                <div class="col-md-4">
    
                    <a href="{{ asset('images/'.$data->foto) }}" data-lightbox = "image-1" data-title="{{ $data->keterangan }}"> <img src="{{ asset('images/'.$data->foto) }}" style="width: 200px; height: 150px"></a>
    
                    <p><h5>{{ $data->nama_galeri }}</h5></p>
                </div>
                @endforeach
            </div>

            <div>{{ $dataGaleri->links() }}</div>

            <section class="container-xl">
                <form action="{{ route('komentar.store', $buku->id) }}" method="POST">
                  @csrf
                  <div class="my-3">
                    <label for="komentar" class="form-label">Komentar</label>
                    <textarea class="form-control @error('komentar') is-invalid @enderror" id="komentar" name="komentar" rows="3"></textarea>
                    @error('komentar')<div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>@enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Posting</button>
                </form>
            </section>

            <section class="container-xl mb-3">
                @foreach($dataKomentar as $komentar)
                <div class="card mt-3">
                  <div class="card-body">
                    <h5 class="card-title">{{ $komentar->user->name }}</h5>
                    <p class="card-text">{{ $komentar->comment }}</p>
                  </div>
                </div>
                @endforeach
            </section>
            
        </div>
    </section>

    @if(Auth::check() && Auth::user()->level == 'admin')
    <p><a class="btn btn-primary mx-5" href="{{ route('galeri.create') }}">Tambah Galeri</a></p>
    @endif

    <h5 class="mx-5">Jumlah Galeri : {{ $dataGaleri->count('id') }}</h5>
    <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
@endsection

