<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\Wisatas;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
  public function __construct()
  {
    if(Auth::user()){
        if(Auth::user()->role == "user"){
          return redirect()->back();
        }
      }
    else{
      return view('auth.login');
    }
  }

  public function index(){
    $counter = 1;
    $transaksi = Transaksi::where('status', 'Menunggu Konfirmasi')->get();

    return view('admin.transaksi', compact('transaksi'));
  }

  public function terima(Request $request, $id){
    $data = Transaksi::find($id);
    $data->status = "Jadwal Wisata Diterima";
    $data->admin = \Auth::user()->name;
    $data->save();
    $request->session()->flash('message','Berhasil Menerima Jadwal Wisata');
    return redirect()->back();
  }

  public function tolak(Request $request, $id){
    $data = Transaksi::find($id);
    $data->status = "Jadwal Wisata Ditolak";
    $data->admin = \Auth::user()->name;
    $data->save();
    $request->session()->flash('message','Berhasil Menolak Jadwal Wisata');
    return redirect()->back();
  }

  public function riwayat(){
    $riwayat = Transaksi::query()->orderBy('created_at', 'desc')->get();

    // $pagination = 5;
    // $riwayat = $riwayat->paginate($pagination);
    // if( request()->has('page') && request()->get('page') > 1){
    //   $no += (request()->get('page')- 1) * $pagination;
    // }

    return view('admin.riwayat', compact('riwayat'));
  }

}
