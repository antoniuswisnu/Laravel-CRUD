@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


<h5 class="display-5 text-center mb-4">CRUD USER</h5>
<table class="table table-striped mx-5 col-mx-5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_user as $user)
            <tr>
                
                <td>{{ ++$no }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->level }}</td>
                <td>
                    <form action="{{ route('user.update', $user->id) }}" method="PUT">
                        @csrf
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                    <form style="display:flex;" action="{{ route('user.destroy', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus?')">delete</button>
                        {{-- @method('POST') --}}
                    </form>
                </td>

            </tr>
        @endforeach
    </tbody>
</table> 

<p><a class="btn btn-primary mx-5" href="{{ route('user.create') }}">Tambah Akun</a></p>
<h5 class="mx-5">Jumlah Akun : {{ $data_user->count('id') }}</h5>


@endsection
