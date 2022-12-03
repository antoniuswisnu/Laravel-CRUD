{{-- @extends('layouts.master'); --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


<form method="POST" action="{{ route('user.store') }}" class="m-4">
    @csrf
    <h5 class="display-5 text-center mx-4 my-4">Tambah Akun</h5>

    @if(count($errors) > 0)
      <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif
    <div class="form-group">
      <label >Name</label>
      <input type="text" class="form-control" name="name"  placeholder="Masukkan Nama">
    </div>
    <div class="form-group">
      <label >Email</label>
      <input type="text" class="form-control" name="email"placeholder="Masukkan Email" >
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="text" class="form-control" name="password"placeholder="Masukkan Password" >
    </div>
    {{-- <div class="form-group">
      <label >Level</label>
      <input type="text" class="form-control" name="level" placeholder="Pilih" >
    </div> --}}
    <div class="form-group">
      <label>Level</label>
      <div class="form-group mt-2 ">
        
        <input type="radio" id="admin" name="level" value="admin">
        <label for="admin">Admin</label><br>
        <input type="radio" id="user" name="level" value="user">
        <label for="user">User</label><br>
      </div>
    </div>
    
    
    <button href="{{route('user.index')}}" type="submit" class="btn btn-primary mt-4">Submit</button>
    <a href="{{route('user.index')}}" class="btn btn-danger mt-4">Batal</a>
</form>



