@extends('admin.template.navigation')

@section('konten')
<!-- Admin Wisata Content -->
    <!-- <style>
      .card-body{
        background-color: white;
        border-radius: 10px
      }

      .card-body p{
        margin-top: -5px
      }

      .gambar:hover {
        transform: scale(3.5);
      }
    </style> -->
    <div class="main-admin">
        <div class="header-admin">
            <h4>List Request Paket</h4>
        </div>
        <div class="content-admin">
            <!-- @if (Session::has('message'))
              <h5><font color="green"> {{ Session::get('message') }}</font></h5><br>
            @endif -->
            <div class="row">
              <br>
              <?php foreach($transaksi as $data) : ?>
                <div style="margin-top: 20px" class="card">
                  <div class="card-body">
                       <h5><strong>{{ \App\PaketWisata::where('id', $data->id_paket)->first()->nama }}</strong></h5><br>
                       <p>Nama Pelanggan : {{ App\User::where('id', $data->id_user)->first()->name }} </p>
                       <p>Tanggal Wisata : {{ date('D, d F Y', strtotime( $data->tanggal)) }} </p>
                       <p>Harga : <strong>  Rp{{ number_format($data->harga ,2,',','.') }} </strong></p>
                       <p>Bukti Bayar : <img class="gambar" src="{{asset('assets/images/bukti')}}/{{ $data->bukti }}" height="120px" width="100px"></p>
                       <div class="justify-content-center">
                         <a style="width: 49%" onclick="return confirm('Apakah Anda Yakin Ingin Menyutujui Jadwal ?')" href="/admin/transaksi/terima/{{ $data->id }}" class="btn btn-success">Setujui</a>
                         <a style="width: 49%" onclick="return confirm('Apakah Anda Yakin Ingin Menolak Jadwal ?')" href="/admin/transaksi/tolak/{{ $data->id }}" class="btn btn-danger">Tolak</a>
                       </div>
                   </div>
                 </div>
              <?php endforeach; ?>
            </div>
      </div>
    <!-- End of Wisata Content -->
@endsection
