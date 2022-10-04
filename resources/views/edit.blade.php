<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<h4>Edit Buku</h4>

@foreach($data_buku as $buku)
    <form method="POST" action="{{ route('buku.update', $buku->id) }}" class="m-4">
        @csrf
        <div class="form-group">
        <label >Judul</label>
        <input type="text" class="form-control" name="judul"  placeholder="Masukkan Judul" 
        value="{{ $buku->judul }}">
        </div>
        <div class="form-group">
        <label >Penulis</label>
        <input type="text" class="form-control" name="penulis"placeholder="Masukkan Penulis"
        value="{{ $buku->penulis }}">
        </div>
        <div class="form-group">
        <label >Harga</label>
        <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga"
        value="{{ $buku->harga }}">
        </div>
        <div class="form-group">
        <label >Tgl. Terbit</label>
        <input type="date" class="form-control" name="tgl_terbit" placeholder="Masukkan Tgl. Terbit" value="{{ $buku->tgl_terbit }}">
        </div>
        <button  type="submit" class="btn btn-primary mt-4">Submit</button>
        <button href="/buku" type="submit" class="btn btn-danger mt-4">Batal</button>
    </form>
@endforeach