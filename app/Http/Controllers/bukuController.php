<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class bukuController extends Controller
{
    public function index(){
        $data_buku = Buku::all()->sortByDesc('id');
        $no = 0;
        return view('index', compact('data_buku','no'));
    }

        public function create(){
            return view('create');
        }

    public function store(Request $request){
        // $request->validate([
        //     'judul' => 'required',
        // ]);
        // $buku = Buku::findOrFail($request);
        // $buku->get($request->all());
        
        // $buku = new Buku;
        // $buku->judul = $request->judul;
        // $buku->penulis = $request->penulis;
        // $buku->harga = $request->harga;
        // $buku->tgl_terbit = $request->tgl_terbit;
        // $buku->save();
        // return redirect('/buku');

        DB::table('buku')->insert([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);    
        return redirect('/buku');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');

    }

    // public function hapus($id){
    //     DB::table('buku')->where('id',$id)->delete();
	//     return redirect('/buku');
    // }
	
    public function edit($id){
        $data_buku = DB::table('buku')->where('id',$id)->get();
        return view('edit',compact('data_buku'));
    }

    public function update(Request $request, $id){
        DB::table('buku')->where('id',$id)->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'harga' => $request->harga,
            'tgl_terbit' => $request->tgl_terbit
        ]);
        return redirect('/buku');
    }
}
