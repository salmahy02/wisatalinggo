@extends('template.navigation2')

@section('konten')
<section class="transaksi">
  <div class="container">
  <h2 style="margin-bottom: 30px">
    Transaksi
  </h2>
  <!-- @if (Session::has('message'))
    <h5><font color="green"> {{ Session::get('message') }}</font></h5><br>
  @endif -->
         <div class="row">
          @foreach($transaksi as $data)
          <div class="col-lg-12" style="margin-top: 20px!important;">
              <div class="card-transaksi">
                  <div class="row">
                      <div class="col-lg-3">
                          <div class="bg-card-t">
                              <div class="overlay-t"></div>
                              <img src="{{ asset('img' . '/' . \App\PaketWisata::where('id', $data->id_paket)->first()->gambar_cover) }}" alt="">
                          </div>
                      </div>
                      <div class="col-lg-9">
                          <div class="content-card">
                              <div class="row">
                                  <div class="col-lg-5">
                                      <div class="brief-card">
                                          <h5>{{ \App\PaketWisata::where('id', $data->id_paket)->first()->nama }}</h5>
                                          <p>Rp{{ number_format(\App\PaketWisata::where('id', $data->id_paket)->first()->harga ,2,',','.') }}</p>
                                          <hr>
                                      </div>
                                  </div>
                                  <div class="col-lg-7">
                                      <div class="detail-card-t">

                                          <div class="row no-gutters">
                                              <div class="col-lg-6">
                                                  <h6>Tanggal</h6>
                                                  <span> {{ date('D, d F Y', strtotime($data->tanggal)) }}</span>
                                              </div>
                                              <div class="col-lg-6">
                                                  <h6>Status</h6>
                                                  @if($data->status == "Jadwal Wisata Ditolak")
                                                  <strong><span style="color:red">{{ $data->status }}</span></strong>
                                                  @elseif($data->status == "Jadwal Wisata Diterima")
                                                  <strong><span style="color:green">{{ $data->status }}</span></strong>
                                                  @elseif($data->status == "Upload Bukti Bayar")
                                                  <strong><span style="color:red">{{ $data->status }}</span></strong>
                                                  @else
                                                  <strong><span style="color:orange">{{ $data->status }}</span></strong>
                                                  @endif
                                              </div>
                                              <a class="btn btn-primary" href="/transaksi/{{ $data->id }}">Detail</a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>  
          @if ($data == null)
          <div class="col-lg-12"><h4>Anda Belum Membuat Transaksi</h4></div>
          @endif  
          @endforeach
      </div>
  </div>
</section>
@endsection
<script src="{{url('assets/scripts/jquery.min.js')}}"></script>
<script src="{{url('assets/scripts/bootstrap/bootstrap.min.js')}}"></script>
