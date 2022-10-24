<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<form action="{{ route('buku.search') }}" method="GET">
    @csrf
    <input type="text" name="kata" class="form-control" placeholder="cari..." style="width: 30%;
    display: inline; margin-top: 10px; margin-bottom: 10px; margin-left: 30px;">
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            <th>Aksi</th>
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
                    <form action="{{ route('buku.update', $buku->id) }}" method="PUT">
                        @csrf
                        <button type="submit" class="btn btn-primary">update</button>
                        
                    </form>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Mau Dihapus?')">delete</button>
                        {{-- @method('PUT') --}}
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div>{{ $data_buku->links('pagination::bootstrap-4') }}</div>
Halaman : {{ $data_buku->currentPage() }} <br/>
Data Per Halaman : {{ $data_buku->perPage() }} <br/>
<div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>


<p><a class="btn btn-primary m-4" href="{{ route('buku.create') }}">Tambah Buku</a></p>

<h5 class=" mx-4">Jumlah Data : {{ $data_buku->count('id') }}</h5>
<p class=" m-4">Jumlah Total Harga Buku : {{ " Rp ".number_format($data_buku->sum('harga')) }} </p>