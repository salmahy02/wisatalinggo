@extends('admin.template.navigation')

@section('konten')
<div class="container mt-5">
    <h4 class="mb-4">Edit Paket Wisata</h4>
    <form action="{{ route('update.paket', $paket->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Paket Wisata input -->
        <div class="row mb-3">
            <div class="col-sm-2">
                <label for="nama_paket" class="col-form-label">Paket Wisata</label>
            </div>
            <div class="col-sm-10">
                <input type="text" id="nama_paket" name="nama_paket" class="form-control" value="{{ $paket->nama_paket }}" required />
            </div>
        </div>

        <!-- Fasilitas input -->
        <div class="row mb-3">
            <div class="col-sm-2">
                <label for="fasilitas" class="col-form-label">Fasilitas</label>
            </div>
            <div class="col-sm-10">
                <textarea id="fasilitas" name="fasilitas" class="form-control" required rows="3">{{ $paket->fasilitas }}</textarea>
            </div>
        </div>

        <!-- Harga Paket input -->
        <div class="row mb-3">
            <div class="col-sm-2">
                <label for="harga" class="col-form-label">Harga Paket</label>
            </div>
            <div class="col-sm-10">
                <input type="number" id="harga" name="harga" class="form-control" value="{{ $paket->harga }}" required />
            </div>
        </div>

        <!-- Gambar Cover File input -->
        <div class="row mb-3">
            <div class="col-sm-2">
                <label for="gambar_cover" class="col-form-label">Gambar Cover</label>
            </div>
            <div class="col-sm-10">
                <input type="file" id="gambar_cover" name="gambar_cover" class="form-control" />
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Update Paket</button>
    </form>
</div>
@endsection
