@extends('admin.template.navigation')

@section('konten')

<div class="container mt-5">
    <h4 class="mb-4">Tambahkan Paket Wisata</h4>
    <form action="{{ route('store.paket') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Paket Wisata input -->
        <div class="row" style="padding-bottom: 30px;">
            <div class="col-sm-2">
                <label for="paketWisata" class="col-form-label">Paket Wisata</label>
            </div>
            <div class="col-sm-10">
                <input type="text" id="nama" name="nama" class="form-control" required />
            </div>
        </div>

        <!-- Fasilitas input -->
        <div class="row" style="padding-bottom: 30px;">
            <div class="col-sm-2">
                <label for="fasilitas" class="col-form-label">Fasilitas</label>
            </div>
            <div class="col-sm-10">
                <textarea id="fasilitas" name="fasilitas" class="form-control" required rows="3"></textarea>
            </div>
        </div>

        <!-- Harga Paket input -->
        <div class="row" style="padding-bottom: 30px;">
            <div class="col-sm-2">
                <label for="harga" class="col-form-label">Harga Paket</label>
            </div>
            <div class="col-sm-10">
                <input type="number" id="harga" name="harga" class="form-control" required />
            </div>
        </div>

        <!-- Gambar Cover File input -->
        <div class="row" style="padding-bottom: 30px;">
            <div class="col-sm-2">
                <label for="gambar_cover" class="col-form-label">Gambar Cover</label>
            </div>
            <div class="col-sm-10">
                <input type="file" id="gambar_cover" name="gambar_cover" class="form-control" />
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
    </form>

</div>

@endsection
