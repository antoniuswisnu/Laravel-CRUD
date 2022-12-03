<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class bukuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index(){
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_user = User::all();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        // $data_buku = DB::table('buku')->paginate(5);
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('index', compact('data_buku','no', 'jumlah_buku', 'data_user'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->buku_seo = Str::slug($request->judul, '-');
        $buku->harga = $request->harga;
        $buku->suka = 0;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Tambah');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Hapus');
    }

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

    public function galBuku($title){
        $buku = Buku::where('buku_seo', $title)->first();
        $dataGaleri = $buku->photos()->orderBy('id', 'desc')->paginate(6);
        $dataKomentar = $buku->comment()->paginate(10);
        return view('galeri.viewGaleri', compact('buku', 'dataGaleri', 'dataKomentar'));
    }

    public function likefoto(Request $request, $id){
        $buku = Buku::find($id);
        $buku->increment('suka');
        return back();
    }


}
