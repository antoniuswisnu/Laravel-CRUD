<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table  = 'galeri';

    public function albums(){
        // return $this->belongsTo('App\Album', 'id_album', 'id');
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
        
    }

    // protected $fillable = ['nama_galeri', 'judul', 'gambar'];
}
