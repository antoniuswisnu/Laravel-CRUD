<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Buku;

class KomentarController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request, $bukuId){
        $this->validate($request, [
            'komentar' => 'required|string',
        ]);
        Komentar::create([
            'user_id' => Auth::id(),
            'book_id' => $bukuId,
            'comment' => $request->komentar
        ]);
        return Back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }




}
