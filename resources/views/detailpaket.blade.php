@extends('template.navigation2')

@section('konten')

<section class="landing paket">
    <div class="container">
        <h1 style="margin-top: 50px; margin-bottom:50px; color: #f8ba10;">{{ $paket->nama}}</h1>
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 100%; height: 250px; border-radius: 50px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);">
                        <div class="card-body">
                            <h5 class="card-title"> 
                                <img src="/img/{{ $paket->gambar_cover }}" 
                            style="object-fit:cover; max-height: 100%; max-width: 100%; border-top-left-radius: 20px; border-top-right-radius: 20px;"></h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                <style>
                 p {
                         text-align: justify;
                 }
                </style>
                    <p>Paket wisata yang ditawarkan bertujuan untuk membuat wisatawan menikmati wisata di Linggoasri yang sesuai dengan kebutuhan. Dalam paket wisata ini akan mendapatkan pemandu wisata yang akan mendampingi wisatawan untuk menikmati wisata yang ada di Linggoasri. 
                        Selain itu, dengan memesan paket wisata ini, maka wisatawan akan dapat menikmati berbagai spot foto yang instgramable di Linggoasri, edukasi mengenai Linggoasri dan budayanya, serta mendapatkan pemandu wisata yang siap menjelaskan peta area Linggoasri yang sangat luas.</p>
                </div>
              
            </div>
        </div>

        <h3 style="padding-top: 50px; color: #f8ba10;">Destinasi Wisata</h3>

        <div class="row" style="padding-top: 10px; margin-left:3px; padding-bottom:30px;">
            <h5 class="card-title" style="padding-right:45px">{{ $paket->fasilitas }}</h5>
            <h5>Rp. {{$paket->harga}},-</h5>
        </div>
        
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!4v1714919538223!6m8!1m7!1skXgVpMksakkXT2FGK3bPaA!2m2!1d-7.105856163819444!2d109.5859752619565!3f223.01495397487022!4f0.14011213018049773!5f0.7820865974627469" width="1200" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>    
        <div class="map-caption">
               Lokasi Desa Wisata LinggoAsri Pekalongan
            </div>
      
        <div class="col-lg-3">
            <div class="sticky-book">
                <div class="booking-section">
                    <div class="container-fluid">
                        <div class="row">
                            <form role="form" action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <h4>Total</h4>
                                    <!-- <p>Rp{{ $paket->harga }}- /orang</p> -->
                                    <p>Rp{{ number_format($paket->harga ,2,',','.') }}- /orang</p>
                                </div>
                                <input type="hidden" name="harga" value="{{$paket->harga}}">
                                <div class="col-12">
                                    <input name="tanggal" type="date" class="form-control" min="{{ date('Y-m-d') }}">
                                    <input type="hidden" name="id_paket" value="{{ $paket->id }}">
                                    <br>
                                    @if(Auth::user())
                                        <button type="submit" class="btn btn-primary"> Booking Now </button>
                                    @else
                                        <a href="/login" class="btn btn-primary">Login Untuk Booking</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
