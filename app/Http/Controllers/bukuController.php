<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class bukuController extends Controller
{
    public function index(){
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        // $data_buku = DB::table('buku')->paginate(5);
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('index', compact('data_buku','no', 'jumlah_buku'));
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
        
        
        // return redirect('/buku');

        // DB::table('buku')->insert([
        //     'judul' => $request->judul,
        //     'penulis' => $request->penulis,
        //     'harga' => $request->harga,
        //     'tgl_terbit' => $request->tgl_terbit
        // ]);    
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Tambah');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Hapus');
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
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Simpan');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis', 'like', "%".$cari."%")->paginate($batas);
        $jumlah_buku = $data_buku->count();
        
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('/search', compact('jumlah_buku', 'no', 'data_buku', 'cari'));
    }
}
