<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Wisatas;
use App\Paket;
use App\PaketWisata;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisata = Wisatas::query()->orderBy('nama', 'asc')->limit(5)->get();
        $pakets = PaketWisata::all();
        return view('home', compact('wisata', 'pakets'));
    }


    public function wisata()
    {
      $counter = 1;
      $wisata = Wisatas::query()->orderBy('nama', 'asc');

      if (request()->has("search") && strlen(request()->query("search")) >= 1) {
        $wisata->where(
          "wisatas.nama", "like", "%" . request()->query("search") . "%"
        );
      }

      $pagination = 8;
      $wisata = $wisata->paginate($pagination);
      if( request()->has('page') && request()->get('page') > 1){
        $counter += (request()->get('page')- 1) * $pagination;
      }

      return view('wisata', compact('wisata','counter'));
    }

    public function wisata_detail($id)
    {
      $data = Wisatas::find($id);
      if($data){
          return view('wisata_detail', compact('data'));
      }else{
        return abort('404');
      }
    }

    public function paket($id)
    {
      $data = Paket::find($id);
      if($data){
        return view('paket', compact('data'));
      }else{
        return abort('404');
      }
    }

    public function logout()
    {
      Auth::logout();
      Session::flash('message', 'Sukses Keluar Akun');
      return redirect('/login');
    }
}
