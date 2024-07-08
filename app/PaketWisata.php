<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    protected $fillable = ['nama', 'fasilitas', 'harga', 'gambar_cover'];
}
