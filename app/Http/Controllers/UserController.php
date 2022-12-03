<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    

    public function index(){
        $data_user = User::all();
        $no = 0;
        return view('account.indexUser', compact('data_user','no'));
    }

    public function create(){
        return view('account.createUser');
    }

    public function store(Request $request){
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request-> password,
            'level' => $request->level
        ]);
        // Schema::create('users', function(Blueprint $table){
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email');
        //     $table->Hash::make('passsword');
        //     $table->string('level');
        // });
        // });
        // $this->validate($request, [
        //     'name' => 'required|string',
        //     'email' => 'required|string',
        //     'password' => 'required|string',
        //     'level' => 'string',
        // ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = $request->level;
        $user->save();
        return redirect('/user')->with('pesan', 'Data Akun Berhasil di Tambah');
    }

    public function destroy($id){
        $user = user::find($id);
        $user->delete();
        return redirect('/user')->with('pesan', 'Data user Berhasil di Hapus');
    }

    public function edit($id){
        $data_user = DB::table('users')->where('id',$id)->get();
        return view('account.editUser',compact('data_user'));
    }

    public function update(Request $request, $id){
        DB::table('users')->where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request-> password,
            'level' => $request->level,
        ]);
        return redirect('/user')->with('pesan', 'Data user Berhasil di Simpan');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_user = user::where('name', 'like', "%".$cari."%")->orwhere('email', 'like', "%".$cari."%")->paginate($batas);
        $jumlah_user = $data_user->count();
        $no = $batas * ($data_user->currentPage() - 1);
        return view('/search', compact('jumlah_user', 'no', 'data_buku', 'cari'));
    }
}
