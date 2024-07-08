@extends('template.navigation')

@section('konten')
<!-- Hero Landing-->
<section class="hero">
    <div class="hero-overlay">
        <span></span>
        <span></span>
    </div>
    <div class="hero-slanted">
        <span></span>
        <span></span>
    </div>
    <div class="hero-content d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="header">
                        <h1>Desa Wisata LinggoAsri</h1>
                        <p>Temukan dan Jelajahi Berbagai Wisata Alam <br>Di <strong>Desa Wisata LinggoAsri</strong><br> di Jl. Raya Linggoasri, Yosorejo, Linggoasri, Kajen, Pekalongan </p>
                        <p><br>Kunjungi Instagram <strong>@wisata_linggoasri</strong><br> </p>
                    </div>
                </div>
                <div class="col-md-5">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="landing city">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center">
                <h2>LinggoAsri</h2>
                <style>
                 p {
                         text-align: justify;
                 }
                </style>
                <p>Desa Wisata LinggoAsri merupakan sebuah
                    <strong><i>destinasi wisata yang menarik di Kabupaten Pekalongan, Jawa Tengah</i></strong>.
                    Berlokasi di perbukitan Desa Linggo, Kecamatan Kajen,
                    LinggoAsri menawarkan beragam keindahan alam yang cocok untuk dikunjungi bersama keluarga atau teman-teman.
                    Desa Wisata LinggoAsri memiliki arena perkemahan yang luas dengan dikelilingi hutan pinus nan indah serta udara pegunungan yang sejuk, serta mempunyai berbagai fasilitas rekerasi. Antara lain kolam renang, taman wisata, dan beberapa koleksi binatang.
                    Di LinggoAsri juga ditemui peninggalan sejarah seperti pura dan lingga. Harga tiket masuk Wisata LinggoAsri Pekalongan sangat murah, kamu hanya perlu mengeluarkan biaya kurang dari Rp. 10.000,- saja per orangnya.
                </p>
            </div>
            <div class="col-md-5">
           
<div class="map-container">
    <iframe src="https://www.google.com/maps/embed?pb=!4v1714914473846!6m8!1m7!1sCAoSLEFGMVFpcE5mbDFHUVNMOVlsY0lCVHlVaVhlemFHajZhQmExSzluMGxtSDZF!2m2!1d-7.1060237!2d109.5870031!3f0!4f0!5f0.7820865974627469" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="map-caption">
    Street View 360° LinggoAsri, Kabupaten Pekalongan, Jawa Tengah
</div>
            </div>
        </div>
    </div>
</section>
<section class="landing features">
    <div class="container features-content">
        <div class="row ">
            <div class="col-md-4">
                <img src="{{url('assets/images/highlight/kuliner.png')}}" width="120px" alt="">
                <h3>Kuliner</h3>
                <p>
                Desa Wisata Linggoasri menawarkan pengalaman kuliner unik yang tak terlupakan. Dari hidangan tradisional hingga camilan khas, setiap suapan menghadirkan cita rasa autentik dan kelezatan yang memikat. 
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{url('assets/images/highlight/wisata.png')}}" width="120px" alt="">
                <h3>Wisata</h3>
                <p>
                    Desa Wisata LinggoAsri memiliki berbagai macam Wisata Alam yang cocok digunakan sebagai tempat rekreasi bagi keluarga.
                </p>

            </div>
            <div class="col-md-4">
                <img src="{{url('assets/images/highlight/sejarah.png')}}" width="120px" alt="">
                <h3>Sejarah</h3>
                <p>
                Di Linggo Asri juga ditemui peninggalan sejarah seperti pura dan lingga. Terdapat batu lingga yang berbentuk bulat dan panjang dan Pura yang biasa digunakan oleh umat Hindu.
                </p>

            </div>
        </div>
    </div>
    <div id="news"></div>
</section>

<section class="landing wisata" id="wisata">
    <div style="padding-top: 60px" class="container">
        <center>
            <h2 style="margin-top:10px">Wisata LinggoAsri</h2>
        </center>
    </div>
    <div class="owl-carousel owl-theme">
        @foreach($wisata as $data)
        <div class="item">
            <a href="/wisata/{{ $data->id }}">
                <div class="item-image">
                    <img class="item-image " src="{{asset('assets/images/wisata')}}/{{ $data->background }}" width="auto" alt="">
                </div>
                <div class="item-text">
                    <span class="item-kicker">{{ $data->nama }}</span>
                    <h3 class="item-title">{{ $data->alamat }}</h3>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div style="margin-top: 40px; padding-bottom:40px" class="container d-flex justify-content-center">
        <a style="font-weight: 700" class="btn btn-primary" href="/wisata">
            Lihat Semua
        </a>
    </div>
    <div class="features-slanted"></div>
</section>

<div id="paket"></div>

<section class="landing paket">
<div style="padding-top: 40px" class="container">
        <center>
            <h2 >Paket Wisata</h2>
            <h6>Jelajahi dan Temukan Paket Wisata Yang Sesuai Dengan Tujuan Anda di Desa Wisata LinggoAsri</h6>
       </center>
    </div>
        <div class=" container mt-5">

            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper d-flex">
                    @foreach ($pakets as $paket)
                    <div class="swiper-slide card h-100 shadow-sm" style="border-radius: 20px;">
                        <div class="card-img-top">
                            <img src="/img/{{ $paket->gambar_cover }}" alt="{{ $paket->nama }}" style="max-height: 100%; max-width: 100%; border-top-left-radius: 20px; border-top-right-radius: 20px;">
                        </div>
                                    <div class="card-body d-block text-center">
                                        <h5 class="card-title">{{ $paket->nama }}</h5>
                                        <h3 class="card-subtitle mb-2 text-muted" style="font-weight: bold;">
                                            Rp.{{ number_format($paket->harga, 0, ',', '.') }},-/orang
                                        </h3>
                                        <div class="d-flex flex-column justify-content-between" style="height:80%"> 
                                        <ul class="list-group list-group-flush" style="padding-top: 20px; border: none;">
                                            @php
                                            $fasilitasList = explode(',', $paket->fasilitas);
                                            @endphp
                                            @foreach($fasilitasList as $fasilitas)
                                            <li class="list-group-item" style="border: none;">{{ $fasilitas }}</li>
                                            @endforeach
                                        </ul>

                                          <a href="{{ route('pakets.detail', $paket->id) }}" class="btn btn-primary d-block mt-auto">Detail Paket</a>
                                        </div>
                                    </div>
                                </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>


<!-- Footer  -->
<section style="margin-top:0!important" class="footer">
    <div class="container">
        <center>
            <img src="{{url('assets/images/logo/logolinggo.png')}}" width="150px" alt="Logo">
            <font color="#f5f5f5" class="font-segoe text-center nopadding">&#8212; &nbsp; Copyright &copy; 2024 - LinggoAsri - Institut Teknologi Telkom Purwokerto</p>
        </center>
    </div>
</section>  
<script src="{{url('assets/scripts/jquery.min.js')}}"></script>
<script src="{{url('assets/scripts/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{url('assets/scripts/owl.carousel.min.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
 <!-- Swiper JS -->
 <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto', // Menyesuaikan jumlah slide per view secara otomatis
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            // Konfigurasi untuk berbagai ukuran layar
            768: {
                slidesPerView: 2, // Menampilkan 2 slide per view pada layar dengan lebar ≥ 768px
            },
            992: {
                slidesPerView: 3, // Menampilkan 3 slide per view pada layar dengan lebar ≥ 992px
            },
            1200: {
                slidesPerView: 4, // Menampilkan 4 slide per view pada layar dengan lebar ≥ 1200px
            },
        }
    });
</script>

<script>
    $('.owl-carousel').owlCarousel({
    loop: false,
    margin: 10,
    dots: false,
    nav: false,
    autoplay: false,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            margin: 2,
            stagePadding: 10,
        },
        576: {
            items: 2,
            margin: 10,
            stagePadding: 20,
        },
        768: {
            items: 3,
            margin: 20,
            stagePadding: 30,
        },
        992: {
            items: 4,
            margin: 30,
            stagePadding: 40,
        }
    }
});

    // Fetch News API

    const newsUrl =
        "https://newsapi.org/v2/everything?apiKey=f8fd87d48cf746e0a817a4f7a21bafe4&q=bandung AND (wisata OR travel OR turis OR alam OR pemandangan)&language=id";
    axios.get(newsUrl).then(resp => {
        for (let i = 0; i < 6; i++) {
            var d = new Date(resp.data.articles[i].publishedAt);
            d = d.getDate() + '-' + (d.getMonth() + 1) + '-' + d.getFullYear() + ' ' + (d.getHours() > 12 ? d.getHours() - 12 : d.getHours()) + ':' + d.getMinutes() + ' ' + (d.getHours() >= 12 ? "PM" : "AM");
            $("#newsContainer").append(`
    <div class="col-md-4 col-sm-6 col-xs-6">
    <a href="${resp.data.articles[i].url}" target="_blank">
    <div class="news-card" style='background-image:url("${
      resp.data.articles[i].urlToImage
    }")'>
        <div class="news-content">
                <h5>${resp.data.articles[i].title}</h5>
                <p>${ d }</p>
        </div>
    </div>
    </a>
</div>
    `);
        }
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'

            });
        });
    });
</script>

<style>
    .card-subtitle {
        position: relative;
        /* Penting untuk positioning pseudo-element */
        font-weight: bold;
        /* Membuat teks bold */
    }

    .card-subtitle::after {
        content: '';
        /* Penting, tidak boleh dihapus karena ini adalah pseudo-element */
        display: block;
        /* Membuat pseudo-element seperti blok */
        width: 100%;
        /* Lebar garis sesuai dengan lebar elemen parent */
        height: 2px;
        /* Ketebalan garis */
        background: black;
        /* Warna garis */
        position: absolute;
        /* Positioning absolute relatif terhadap elemen parent */
        left: 0;
        bottom: -10px;
        /* Mengatur posisi vertikal garis di bawah teks */
    }
</style>

@endsection


</html>
