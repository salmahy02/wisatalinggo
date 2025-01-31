<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Wisata Linggo</title>
    <link href="{{url('img/logo.png')}}" rel="icon" type="image/png">
    <link rel="stylesheet" href="{{url('assets/styles/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/styles/styles.css')}}">
</head>

<body class="admin-page">
    <!-- Admin Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/admin/wisata">
            <img src="{{url('assets/images/logo.png')}}" width="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbaradmin" aria-controls="navbaradmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse nav-admin" id="navbaradmin">
            <ul class="navbar-nav ml-auto text-dark">
                <li class="nav-item nav-main-admin">
                    <a class="nav-link" href="/admin/wisata">
                        <span class="sr-only"></span>Wisata</a>
                </li>
                <li class="nav-item nav-main-admin">
                    <a class="nav-link" href="/admin/transaksi">
                        <span class="sr-only"></span>Transaksi</a>
                </li>
                <li class="nav-item nav-main-admin">
                    <a class="nav-link" href="/admin/riwayat">
                        <span class="sr-only"></span>Riwayat Transaksi</a>
                </li>
                <li class="nav-item nav-main-admin">
                    <a class="nav-link" href="{{ route('add.paket') }}">
                        <span class="sr-only"></span>Tambah Paket</a>
                </li>
              
            </ul>
        </div>
        @if(Auth::user())
                <a class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/">Home</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </a>
            @endif
    </nav>
    <!-- End of Admin Navbar -->

    <!-- Admin Sidebar -->
    <div class="admin-sidebar" style="z-index:999">
        <ul class="nav flex-column nav-sidebar">
            <li class="nav-item">
                <a class="nav-link" href="/admin/wisata">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/transaksi">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 6l-3.75 5 2.85 3.8-1.6 1.2C9.81 13.75 7 10 7 10l-6 8h22L14 6z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/riwayat">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z" />
                    </svg>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{ route('add.paket') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 17c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm-.6-10.8h-1.4v3.5h-2v1.6h2v3.5h1.4v-3.5h2v-1.6h-2v-3.5z" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>

    @yield('konten')

</body>
<script src="{{url('assets/scripts/jquery.min.js')}}"></script>
<script src="{{url('assets/scripts/bootstrap/bootstrap.min.js')}}"></script>

</html>
<!-- End of Wisata Content -->
