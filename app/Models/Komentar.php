<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentar';
    protected $fillable = [
        'user_id',
        'book_id',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id','id');
    }

}
