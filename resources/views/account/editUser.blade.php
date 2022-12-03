<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<h5 class="display-5 text-center mx-4 my-4">Edit Akun</h5>

@foreach($data_user as $user)
    <form method="POST" action="{{ route('user.update', $user->id) }}" class="m-4">
        @csrf
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="name"  placeholder="Masukkan Nama"
            value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label >Email</label>
            <input type="text" class="form-control" name="email"placeholder="Masukkan Email" 
            value="{{ $user->email}}">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" class="form-control" name="password"placeholder="Masukkan Password" 
            value="{{ $user->password }}">
        </div>
        <div class="form-group">
            <label>Level</label>
            <div class="form-group mt-2 ">
                <input type="radio" id="admin" name="level" value="{{ $user->level }}">
                <label for="admin">Admin</label><br>
                <input type="radio" id="user" name="level" value="{{ $user->level }}" >
                <label for="user">User</label><br>
            </div>
        </div>
        
        <button  type="submit" class="btn btn-primary mt-4">Submit</button>
        <button href="/user" type="submit" class="btn btn-danger mt-4">Batal</button>
    </form>
@endforeach