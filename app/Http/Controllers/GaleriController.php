<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Buku;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function index(){
        $batas = 4;
        $buku = Buku::all();
        $dataGaleri = Galeri::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($dataGaleri->currentPage() - 1);
        return view('galeri.indexGaleri', compact('dataGaleri','no','buku'));
    }

    public function viewGaleri(){
        return view('galeri.viewGaleri');
    }

    public function create(){
        $buku = Buku::all();
        return view('galeri.createGaleri', compact('buku'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $galeri = New Galeri;    
        $galeri->nama_galeri = $request->nama_galeri;    
        $galeri->keterangan = $request->keterangan;    
        $galeri->id_buku = $request->id_buku; 
        
        $foto = $request-> foto;
        $namaFile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200, 150)->save('thumb/'.$namaFile);
        $foto->move('images/', $namaFile);

        $galeri->foto = $namaFile;
        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data Galeri Bku Berhasil Disimpan');
    }    

    public function destroy($id){
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('pesan', 'Data Buku Berhasil di Hapus');
    }

    public function edit($id){
        // $data_galeri = DB::table('galeri')->where('id',$id)->get();
        $dataBuku = Buku::all(['id', 'judul']);
        $galeri = Galeri::find($id);
        return view('galeri.editGaleri',compact('dataBuku', 'galeri'));
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required'
        ]);

        $path = public_path('thumb/');

        $galeri = Galeri::find($id);
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;

        if ($request->has('foto'))
        {
            $foto = $request->foto;
            $namaFile = time().".".$foto->getClientOriginalExtension();
            Image::make($foto)->resize(200,150)->save($path . $namaFile);
            $foto->move('images/', $namaFile);

            if (File::exists($path . $galeri->foto))
            {
                File::delete($path . $galeri->foto);
                File::delete('images/' . $galeri->foto);
            }

            $galeri->foto = $namaFile;
        }

        $galeri->save();
        return redirect('/galeri')->with('message', 'Data galeri buku berhasil diupdate');
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis', 'like', "%".$cari."%")->paginate($batas);
        $jumlah_buku = $data_buku->count();
        
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('/search', compact('jumlah_buku', 'no', 'data_buku', 'cari'));
    }

    public function tampilSearch(){
        return view('galeri.viewGaleri');
    }

}


      
