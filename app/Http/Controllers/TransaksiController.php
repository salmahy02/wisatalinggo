<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class TransaksiController extends Controller
{

    public function __construct()
    {
      $this->middleware(function ($request, $next){
        if(\Auth::user()){
          return $next($request);
        }
        else{
          \Session::flash('message_gagal', 'Anda Harus Login Dahulu');
          return redirect('/login');
          return $next($request);
        }
      });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function transaksi()
    // {
    //   $transaksi = Transaksi::where('id_user', \Auth::user()->id)->orderBy('updated_at', 'desc')->get();
    //   // return view('transaksi', compact('transaksi'));
    //   // return $transaksi;
    // }

    public function transaksi() {
      $transaksi = Transaksi::where('id_user', \Auth::user()->id)->orderBy('updated_at', 'desc')->get();
      return view('transaksi', [
        'transaksi' => $transaksi
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $request->validate([
      //   'id_paket' => 'required|exists:paket_wisata,id',
      //   'tanggal' => 'required|date',
      // ]);
    
        $data = new Transaksi($request->except("_token"));
        $data->status = "Upload Bukti Bayar";
        $data->id_user = \Auth::user()->id;
        // $data->save();
        // $request->session()->flash('message','Sukses Menambah Jadwal, Silahkan Mengupload Bukti Bayar');
        // return redirect('transaksi');

        // Simpan transaksi
        // $data = new Transaksi();
        $data->id_paket = $request->input('id_paket');
        $data->tanggal = $request->input('tanggal');
        $data->harga = $request->input('harga');
        // $data->user_id = Auth::user()->id();
        // $data->status = 'Menunggu Konfirmasi';
        $data->save();

        return redirect()->route('transaksi.show', $data->id)->with('message', 'Transaksi berhasil dibuat.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Transaksi::where('id', $id)->first();
        $paket = \App\PaketWisata::where('id', $data->id_paket)->first();

        // return [$data, $paket];
        if($data){
          return view('transaksi_detail', [
            'data' => $data,
            'paket' => $paket
          ]);
        }else{
          return abort('404');
        }

        // $data = Transaksi::with('paket', 'user')->findOrFail($id);
        // return view('transaksi.show', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = Transaksi::find($id);

      $imageName = time().$request->bukti->getClientOriginalName();
      request()->bukti->move(public_path('assets/images/bukti'), $imageName);
      $data->bukti = $imageName;
      $data->status = "Menunggu Konfirmasi";
      $data->save();

      $request->session()->flash('message','Berhasil Menambahkan Bukti Bayar');
      return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $data = Transaksi::find($id);
      $data->delete();
      if($data) {
          Session::flash('message','Berhasil menghapus Transaksi');
      }
      return redirect()->back();
    }

    public function showDetail($id)
{
    $data = Transaksi::find($id);
    // Lakukan validasi jika data tidak ditemukan atau berbagai operasi lainnya

    return view('transaksi-detail', compact('data'));
}


    
}
