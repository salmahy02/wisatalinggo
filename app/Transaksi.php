<?php

namespace App;

use App\Paket;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $timestamps = true;
    protected $fillable = ['id_user', 'paket', 'admin', 'tanggal', 'harga', 'bukti', 'status'];

    public function pakets()
    {
      return $this->hasOne(Paket::class, 'id', 'paket');
    }

    public function users()
    {
      return $this->hasOne(User::class, 'id', 'id_user');
    }
}
