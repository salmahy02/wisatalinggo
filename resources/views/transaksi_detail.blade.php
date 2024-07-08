@extends('template.navigation2')

@section('konten')
<section class="transaksi-detail mt-5">
        <!-- <div class="container">
            <div class="row" style="margin-top: 40px">
                <div class="col-lg-6">
                    <h2 style="margin-bottom: 10px;">
                      {{ ($data->paket == 1) }}
                    </h2>
                    <h6>  {{ date('D, d F Y', strtotime($data->created_at)) }}</h6>
                    @if($data->id)
                    <div class="detail-content-pkt">
                      <ul class="destinasi-pkt">
                      <div class="container mt-5">
                     <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card" style="border-radius: 30px; box-shadow: 0 5px 8px rgba(0, 0, 0, 0.3); position: relative;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $paket->fasilitas }}</h5>
                        </div>
                    </div>
                </div>
                    </div>
                    @elseif($data->paket == 2)
                    <div class="detail-content-pkt">
                        <ul class="destinasi-pkt">
                        <li>Flaying Fox
                            <span>Rp. 20.000,-</span>
                          </li>
                          <li>Ice Breaking
                            <span>Rp. 10.000,-</span>
                          </li>
                          <li>3 Fun Game
                            <span>Rp. 10.000,-</span>
                          </li>            
                          <li>Junggle Tracking
                            <span>Rp. 10.000,-</span>
                          </li>
                          </ul>
                    </div>
                    @else
                      <div class="detail-content-pkt">
                    <ul class="destinasi-pkt">
                        <li>Flaying Fox
                            <span>Rp. 20.000,-</span>
                          </li>
                          <li>3 Fun Game
                            <span>Rp. 10.000,-</span>
                          </li>
                          <li>Beri Makan Rusa
                            <span>Rp. 15.000,-</span>
                          </li>            
                          <li>Tangkap Ikan
                            <span>Rp. 15.000,-</span>
                          </li>
                          <li>Renang
                            <span>Rp. 5.000,-</span>
                          </li>
                    </ul>
                    </div>
                    @endif
                    <div style="height: 300px; margin-bottom: 50px" class="map-pkt" id="mapPaket"></div>
                </div>
                <div class="col-lg-6">
                    <h6>Status:
                      @if($data->status == "Jadwal Wisata Diterima")
                      <span style="color:green">{{ $data->status }} [Lunas]</span>
                      @elseif($data->status == "Menunggu Konfirmasi")
                      <span style="color:orange">{{ $data->status }}</span>
                      @else
                      <span style="color:red">{{ $data->status }}</span>
                      @endif
                    </h6>
                    <div class="payment-method">
                        @if($data->status == "Jadwal Wisata Diterima")
                          <h5> <center>Bukti Bayar :</center> </h5>
                          <img style="display:block; margin:auto;" src="{{asset('assets/images/bukti')}}/{{ $data->bukti }}" width="50%"></p>
                        @elseif($data->status == "Menunggu Konfirmasi")
                          <span>Please choose your preferred payment method</span>
                          <hr>
                          <img src="https://upload.wikimedia.org/wikipedia/id/f/fa/Bank_Mandiri_logo.svg"
                              alt="mandiri-logo" height="30">
                          <hr>
                          <div class="container">
                              <p style="text-align: center">MANDIRI 1390027181407 <br>
                                  a/n LinggoAsri<br>
                                  Institut Teknologi Telkom Purwokerto 53147</p>
                          </div>
                          <img style="display:block; margin:auto;" src="{{asset('assets/images/bukti')}}/{{ $data->bukti }}" width="50%"></p>
                          <input type="file" style="border-bottom: none!important;"/>
                          <a class="btn btn-primary" href="#" style="width: 100%">Upload Bukti Pembayaran</a>
                        @else
                        <span>Please choose your preferred payment method</span>
                        <hr>
                        <img src="https://upload.wikimedia.org/wikipedia/id/f/fa/Bank_Mandiri_logo.svg"
                            alt="mandiri-logo" height="30">
                        <hr>
                        <div class="container">
                              <p style="text-align: center">MANDIRI 1390027181407 <br>
                                  a/n LinggoAsri<br>
                                  Institut Teknologi Telkom Purwokerto 53147</p>
                          </div>
                        <form action="/transaksi/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                          @method('PUT  ')
                          @csrf
                          <input type="file" name="bukti" style="border-bottom: none!important;"/>
                          <button type="submit" class="btn btn-primary" href="#" style="width: 100%">Upload Bukti Pembayaran</a>
                        </form>
                        @endif
                    </div>
                    <h4>Total: <span>Rp{{ number_format($data->harga ,2,',','.') }}</span></h4>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <h5>Invoiced To</h5>
                    <p>{{ $data->users->name }}</p>
                </div>
                <div class="col-lg-6">
                    <h5>Pay to</h5>
                    <p>LinggoAsri</p>
                </div>
            </div>
        </div> -->

<div class="container">
  <div class="row">
    <div class="col-6">
        <h2>{{\App\PaketWisata::where('id', $data->id_paket)->first()->nama}}</h2>
        <h6>  {{ date('D, d F Y', strtotime($data->tanggal)) }}</h6>
        <p>{{\App\PaketWisata::where('id', $data->id_paket)->first()->fasilitas}}</p>
    </div>
    <div class="col-6">
    <h6>Status:
          @if($data->status == "Jadwal Wisata Diterima")
          <span style="color:green">{{ $data->status }} [Lunas]</span>
          @elseif($data->status == "Menunggu Konfirmasi")
          <span style="color:orange">{{ $data->status }}</span>
          @else
          <span style="color:red">{{ $data->status }}</span>
          @endif
        </h6>
        <div class="payment-method">
            @if($data->status == "Jadwal Wisata Diterima")
              <h5> <center>Bukti Bayar :</center> </h5>
              <img style="display:block; margin:auto;" src="{{asset('assets/images/bukti')}}/{{ $data->bukti }}" width="50%"></p>
            @elseif($data->status == "Menunggu Konfirmasi")
              <span>Please choose your preferred payment method</span>
              <hr>
              <img src="https://upload.wikimedia.org/wikipedia/id/f/fa/Bank_Mandiri_logo.svg"
                  alt="mandiri-logo" height="30">
              <hr>
              <div class="container">
                  <p style="text-align: center">MANDIRI 1390027181407 <br>
                      a/n LinggoAsri<br>
                      Institut Teknologi Telkom Purwokerto 53147</p>
              </div>
              <img style="display:block; margin:auto;" src="{{asset('assets/images/bukti')}}/{{ $data->bukti }}" width="50%"></p>
              <input type="file" style="border-bottom: none!important;"/>
              <a class="btn btn-primary" href="#" style="width: 100%">Upload Bukti Pembayaran</a>
            @else
            <span>Please choose your preferred payment method</span>
            <hr>
            <img src="https://upload.wikimedia.org/wikipedia/id/f/fa/Bank_Mandiri_logo.svg"
                alt="mandiri-logo" height="30">
            <hr>
            <div class="container">
                  <p style="text-align: center">MANDIRI 1390027181407 <br>
                      a/n LinggoAsri<br>
                      Institut Teknologi Telkom Purwokerto 53147</p>
              </div>
            <form action="/transaksi/{{ $data->id }}" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <input type="file" name="bukti" style="border-bottom: none!important;"/>
              <button type="submit" class="btn btn-primary" href="#" style="width: 100%">Upload Bukti Pembayaran</a>
            </form>
            @endif
        </div>
        <h4>Total: <span>Rp{{ number_format(\App\PaketWisata::where('id', $data->id_paket)->first()->harga ,2,',','.') }}</span></h4>
    </div>
  </div>
</div>
</section>

    <!-- Footer  -->
    <section class="footer-t">
        <div class="container">
          <center>
            <img src="{{url('assets/images/logo/logolinggo.png')}}" width="150px" alt="Logo">
             <font color="#f5f5f5" class="font-segoe text-center nopadding">&#8212; &nbsp; Copyright &copy; 2024 - LinggoAsri - Institut Teknologi Telkom Purwokerto</p>
          </center>
        </div>
    </section>
    <!-- End of Footer  -->

    <script src="{{url('assets/scripts/jquery.min.js')}}"></script>
    <script src="{{url('assets/scripts/bootstrap/bootstrap.min.js')}}"></script>
    <div class="col-md-6">
         

<script>
     let locationArrPkt = []

$(".destinasi-pkt li").each(function (a) {
    locationArrPkt.push($(this).text())
})


function initMap() {
    const map = new google.maps.Map(document.getElementById("mapPaket"), {
        center: { lat: -6.893396, lng: 107.62067 },
        zoom: 12
    });

    const geocoder = new google.maps.Geocoder();

    geoLocation(geocoder, map);
}

function geoLocation(geocoder, mapResults) {

    locationArrPkt.map(location => {
        geocoder.geocode({ address: location }, function (res, status) {
            if (status == "OK") {
                // mapResults.setCenter(res[0].geometry.location);
                const marker = new google.maps.Marker({
                    map: mapResults,
                    position: res[0].geometry.location
                });

                marker.addListener('click', () => {
                    console.log('clicked')
                    mapResults.setZoom(15);
                    mapResults.setCenter(res[0].geometry.location)
                })
            } else {
                console.log(status);
            }
        });
    })

}
</script>
    @endsection
