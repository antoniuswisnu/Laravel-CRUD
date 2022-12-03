@extends('layouts.app')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<h5 class="display-5 text-center mb-4">CRUD BUKU</h5>

<form class="mx-5 mb-4" action="{{ route('buku.search') }}" method="GET">
    @csrf
    <input class="search" type="text" name="kata" class="form-control" placeholder="cari..." >
</form>


<table class="table table-striped mx-5" >
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            <th>Like</th>
            @if(Auth::check() && Auth::user()->level == 'admin')
            <th>Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody>

        @if(Session::has('pesan'))
            <div class="alert alert-success">{{ Session::get('pesan') }}</div>
        @endif

        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',','.') }}</td>
                <td>{{ $buku->tgl_terbit->format('d/m/y')}}</td>

                <td>
                    <a href="{{ route('buku.suka', $buku->id )}}" class="btn btn-primary btn-sm">
                        <i class="fa fa-thumbs-up"></i>Like
                        <span class="badge badge-light">{{$buku->suka}}</span>
                    </a>
                </td>
                
                @if(Auth::check() && Auth::user()->level == 'admin')
                <td>
                    
                    <form method="POST">
                        @csrf
                        <a class="mx-1" href="{{ route('buku.detail', $buku->buku_seo )}}"><i class="btn btn-outline-primary">Detail</i></a>
                        <a class="mx-1" href="{{ route('buku.edit', $buku->id )}}"><i class="btn btn-primary">Edit</i></a>
                        <a class="mx-1" href="{{ route('buku.destroy', $buku->id )}}"><i class="btn btn-danger">Hapus</i></a>
                    </form>
                </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table> 

<div class="mx-5">{{$data_buku->links('pagination::bootstrap-4')}}</div>

@if(Auth::check() && Auth::user()->level == 'admin')
<p><a class="btn btn-primary mx-5" href="{{ route('buku.create') }}">Tambah Buku</a></p>
<h5 class="mx-5">Jumlah Buku : {{ $data_buku->count('id') }}</h5>
<p class="mx-5">Jumlah Total Harga Buku : {{ " Rp ".number_format($data_buku->sum('harga')) }} </p>
@endif

@endsection
