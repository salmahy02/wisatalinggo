<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaketWisata;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = PaketWisata::all();

        if (request()->route()->named('home')) {
            return view('home', compact('pakets'));
        } else {
            return view('admin.addpaket', compact('pakets'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = 'active';
        return view('admin.createpaket', compact('active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'harga' => 'required|numeric',
            'gambar_cover' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:1999'
        ]);

        if ($request->hasFile('gambar_cover')) {
            $filename = time() . '.' . $request->gambar_cover->getClientOriginalExtension();
            $request->gambar_cover->move(public_path('img'), $filename);
            $data['gambar_cover'] = $filename;
        }

        PaketWisata::create($data);

        return redirect()->route('add.paket')->with('success', 'Paket Wisata berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paket = PaketWisata::find($id);
        if ($paket) {
            return view('admin.addpaket', compact('paketwisata'));
        } else {
            return abort(404);
        }
    }

    public function showDetail($id)
    {
        $paket = PaketWisata::findOrFail($id);
        return view('detailpaket', compact('paket'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paket = PaketWisata::findOrFail($id);
        $active = 'active';
        return view('admin.editpaket', compact('paket', 'active'));
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
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'fasilitas' => 'required|string',
            'harga' => 'required|numeric',
            'gambar_cover' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:1999'
        ]);

        $paket = PaketWisata::findOrFail($id);

        if ($request->hasFile('gambar_cover')) {
            // Delete old file if exists
            if ($paket->gambar_cover && file_exists(public_path('img/' . $paket->gambar_cover))) {
                unlink(public_path('img/' . $paket->gambar_cover));
            }

            // Upload new file
            $filename = time() . '.' . $request->gambar_cover->getClientOriginalExtension();
            $request->gambar_cover->move(public_path('img'), $filename);
            $data['gambar_cover'] = $filename;
        }

        $paket->update($data);

        return redirect()->route('add.paket')->with('success', 'Paket Wisata berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = PaketWisata::find($id);

        // Cek apakah paket ditemukan
        if (!$paket) {
            return redirect()->route('add.paket')->with('error', 'Paket Wisata tidak ditemukan.');
        }

        // Jika gambar_cover ada, hapus file gambar dari penyimpanan
        if ($paket->gambar_cover && file_exists(public_path('img/' . $paket->gambar_cover))) {
            unlink(public_path('img/' . $paket->gambar_cover));
        }

        // Hapus paket wisata dari database
        $paket->delete();

        return redirect()->route('add.paket')->with('success', 'Paket Wisata berhasil dihapus.');
    }
}
