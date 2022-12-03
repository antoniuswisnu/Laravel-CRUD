@extends('layouts.app')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@section('content')

@yield('isi')

<h5 class="display-5 text-center mb-4">Galeri  </h5>

<table class="table table-striped mx-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Judul</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($dataGaleri as $data)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $data->nama_galeri }}</td>
            <td>{{ $data->albums->judul }}</td>
            <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px;"></td>
            <td>
                <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                    @csrf

                <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i> Edit</a>

                <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus')">
                    <i class="fa fa-pencil-alt"></i> Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


<div class="mx-5">{{$dataGaleri->links('pagination::bootstrap-4')}}</div>

@if(Auth::check() && Auth::user()->level == 'admin')

<p><a class="btn btn-primary mx-5" href="{{ route('galeri.create') }}">Tambah Galeri</a></p>
<h5 class="mx-5">Jumlah Galeri : {{ $dataGaleri->count('id') }}</h5>


@endif


@endsection

