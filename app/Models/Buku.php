<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $dates = ['tgl_terbit'];
    // protected $fillable = ['judul','penerbit','penulis','tgl_terbit'];
}
