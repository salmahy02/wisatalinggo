@extends('admin.template.navigation')

@section('konten')
<div class="main-admin">
    <div class="header-admin">
        <h4>List Paket Wisata</h4>
    </div>
    <div style="display: flex; justify-content: end; height:40px">
        <a href="{{ route('create.paket') }}" class="btn btn-primary">Tambah Paket</a>
    </div>

    <div class="container mt-5">
        <div class="row">
            @foreach($pakets as $paket)
            <div class="col-md-4 mb-4">
                <div class="card" style="border-radius: 30px; box-shadow: 0 5px 8px rgba(0, 0, 0, 0.3); position: relative;">
                    <div class="card-img-top" style="background-image: url('/img/{{ $paket->gambar_cover }}'); height: 140px; border-top-left-radius: 10px; border-top-right-radius: 10px;"></div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $paket->nama }}</h5>
                        <p class="card-text" style="font-size: 25px; color:gray;">{{ number_format($paket->harga, 0, ',', '.') }}/orang</p>
                        <form action="{{ route('destroy.paket', $paket->id) }}" method="POST" style="position: absolute; bottom: 10px; right: 10px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?');" style="border: none; background: none; color: gray;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


    @endsection
