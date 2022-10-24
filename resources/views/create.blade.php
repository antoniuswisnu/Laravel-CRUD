{{-- @extends('layouts.master'); --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>




<form method="POST" action="{{ route('buku.store') }}" class="m-4">
    @csrf
    <h4>Tambah Buku</h4>
    @if(count($errors) > 0)
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <div class="form-group">
      <label >Judul</label>
      <input type="text" class="form-control" name="judul"  placeholder="Masukkan Judul">
    </div>
    <div class="form-group">
      <label >Penulis</label>
      <input type="text" class="form-control" name="penulis"placeholder="Masukkan Penulis" >
    </div>
    <div class="form-group">
      <label >Harga</label>
      <input type="text" class="form-control" name="harga" placeholder="Masukkan Harga" >
    </div>
    <div class="form-group">
      <label >Tgl. Terbit</label>
      <input type="text" id="datepicker" class="form-control" name="tgl_terbit" placeholder="yyyy/mm/dd"  >
    </div>
    <button href="/buku" type="submit" class="btn btn-primary mt-4">Submit</button>
    <a href="/buku" class="btn btn-danger mt-4">Batal</a>
</form>


  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
{{-- <div class="container">
    <h4>Tambah Buku</h4>
    <form method="POST" action="/buku/store">
    @csrf
        <div>Judul<input 
            type="text" name="judul"></div>
        <div>Penulis <input type="text" name="penulis"></div>
        <div>Harga <input type="text" name="harga"></div>
        <div>Tgl. Terbit <input type="text" name="tgl_terbit"></div>
        <div><button type="submit"Simpan>SIMPAN</button></div>
        <div><a href="/buku">Batal</a></div>
    @method('PUT')    
    </form>
</div> --}}

