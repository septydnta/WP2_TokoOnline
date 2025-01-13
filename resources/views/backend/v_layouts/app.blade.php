<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('image/keranjang.png') }}">
    <title>SIMARKET</title>
    <style>
        .navbar-custom {
            background-color: #28544B;
            /* Ganti dengan warna yang diinginkan */
        }

        .logo-text {
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            font-size: 1.5rem;
            background: linear-gradient(45deg, #4CAF50, #FFC107);
            /* Gradasi warna */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .left-sidebar {
            transition: all 0.3s ease-in-out;
            transform: translateX(0);
        }

        .left-sidebar.open {
            transform: translateX(-250px);
            /* Geser ke kiri, sesuaikan dengan ukuran sidebar Anda */
        }

        .navbar-nav .dropdown-menu {
            border-radius: 10px;
            /* Membuat sudut lebih melengkung */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Memberikan efek bayangan */
            background-color: #ffffff;
            /* Warna latar belakang */
            border: none;
            /* Menghapus border default */
        }

        .navbar-nav .dropdown-item {
            padding: 10px 20px;
            /* Memberikan ruang yang cukup */
            font-size: 14px;
            /* Ukuran font yang nyaman */
            color: #333;
            /* Warna teks */
            transition: all 0.3s ease;
            /* Animasi transisi */
        }

        .navbar-nav .dropdown-item:hover {
            background-color: #f2f2f2;
            /* Warna latar saat di-hover */
            color: #000;
            /* Warna teks saat di-hover */
        }

        .navbar-nav .dropdown-divider {
            margin: 10px 0;
            /* Jarak antar item */
        }

        .navbar-nav .user-avatar {
            transition: all 0.3s ease;
            /* Animasi transisi untuk avatar */
        }

        .navbar-nav .user-avatar:hover {
            transform: scale(1.1);
            /* Membesarkan avatar saat di-hover */
        }

        /* Warna dasar sidebar item */
        .sidebar-item .sidebar-link {
            color: #ffffff;
            /* Teks warna putih */
            background-color: #214430;
            /* Warna dasar hijau gelap */
            border-radius: 5px;
            /* Sudut melengkung */
            padding: 10px 15px;
            /* Memberikan ruang */
            transition: all 0.3s ease;
            /* Efek transisi */
        }

        /* Hover efek untuk item sidebar */
        .sidebar-item .sidebar-link:hover {
            background-color: #1b3727;
            /* Warna lebih gelap saat di-hover */
            color: #e0e0e0;
            /* Warna teks lebih terang saat di-hover */
        }

        /* Dropdown menu di sidebar */
        .sidebar-item ul {
            background-color: #214430;
            /* Warna dasar dropdown */
            border-radius: 5px;
            /* Melengkungkan sudut dropdown */
            padding: 10px 0;
            /* Jarak antar item */
        }

        /* Item di dalam dropdown */
        .sidebar-item ul .sidebar-link {
            color: #ffffff;
            /* Teks warna putih */
            padding: 8px 20px;
            /* Memberikan jarak */
            font-size: 14px;
            /* Ukuran font */
            transition: all 0.3s ease;
            /* Efek transisi */
        }

        /* Hover efek untuk item dalam dropdown */
        .sidebar-item ul .sidebar-link:hover {
            background-color: #1b3727;
            /* Warna hover dropdown */
            color: #e0e0e0;
            /* Teks lebih terang */
        }

        /* Ikon dalam sidebar */
        .sidebar-item i {
            margin-right: 10px;
            /* Jarak antara ikon dan teks */
            font-size: 18px;
            /* Ukuran ikon */
            color: #ffffff;
            /* Warna ikon */
        }

        /* Hover efek untuk ikon */
        .sidebar-item i:hover {
            color: #e0e0e0;
            /* Warna ikon saat di-hover */
        }
    </style>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/extralibs/multicheck/multicheck.css') }}">
    <link href="{{ asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav style="background-color: #214430;" nav class="navbar top-navbar navbar-expand-md  bg-success">
                <div style="background-color: #214430;" class="navbar-header" data-logobg="skin5">
                    <!-- Sidebar toggle which is visible on mobile -->
                    <nav style="background-color: #214430" id="toggleSidebar"
                        class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </nav>
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <img src="{{ asset('image/keranjang.png') }}" class="light-logo" width="60"
                                height="60" />
                        </b>
                        <span class="logo-text">
                            SIMARKET
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <div style="background-color: #214430 !important;" class="navbar-collapse collapse"
                    id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                                href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (Auth::user()->foto)
                                    <img src="{{ asset('storage/img-user/' . Auth::user()->foto) }}" alt="user"
                                        class="rounded-circle user-avatar" width="31">
                                @else
                                    <img src="{{ asset('storage/img-user/img-default.jpg') }}" alt="user"
                                        class="rounded-circle user-avatar" width="31">
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated custom-dropdown">
                                <a class="dropdown-item" href="{{ route('backend.user.edit', Auth::user()->id) }}">
                                    <i class="ti-user m-r-5"></i> Profil Saya
                                </a>
                                <a class="dropdown-item" href=""
                                    onclick="event.preventDefault(); document.getElementById('keluar-app').submit();">
                                    <i class="fa fa-power-off m-r-5"></i> Keluar
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside style="background-color: #214430;" class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" style="background-color: #214430;" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('backend.beranda') }}" aria-expanded="false">
                                <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('backend.user.index') }}" aria-expanded="false">
                                <i class="mdi mdi-account"></i><span class="hide-menu">User</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect " href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="mdi mdi-shopping"></i>
                                <span class="hide-menu">Data Produk</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('backend.kategori.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-chevron-right"></i>
                                        <span class="hide-menu">Kategori</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('backend.produk.index') }}" class="sidebar-link">
                                        <i class="mdi mdi-chevron-right"></i>
                                        <span class="hide-menu">Produk</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false">
                                <i class="mdi mdi-receipt"></i><span class="hide-menu">Laporan </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="{{ route('backend.laporan.formuser') }}"
                                        class="sidebar-link">
                                        <i class="mdi mdi-chevron-right"></i><span class="hide-menu"> User </span></a>
                                </li>
                                <li class="sidebar-item"><a href="{{ route('backend.laporan.formproduk') }}"
                                        class="sidebar-link">
                                        <i class="mdi mdi-chevron-right"></i><span class="hide-menu"> Produk
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- @yieldAwal -->
                @yield('content')
                <!-- @yieldAkhir-->

            </div>
            <footer class="footer text-center">
                Web Programming Studi Kasus Mini Market
            </footer>
        </div>

    </div>
    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('backend/libs/perfect-scrollbar/dist/perfectscrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/dist/js/custom.min.js') }}"></script>
    <!-- this page js -->
    <script src="{{ asset('backend/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <!-- form keluar app -->
    <form id="keluar-app" action="{{ route('backend.logout') }}" method="POST" class="dnone">
        @csrf
    </form>
    <!-- form keluar app end -->

    <!-- sweetalert -->
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <!-- sweetalert End -->
    <!-- konfirmasi success-->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}"
            });
        </script>
    @endif
    <!-- konfirmasi success End-->

    <script type="text/javascript">
        //Konfirmasi delete
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var konfdelete = $(this).data("konf-delete");
            event.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Hapus Data?',
                html: "Data yang dihapus <strong>" + konfdelete + "</strong> tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, dihapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success')
                        .then(() => {
                            form.submit();
                        });
                }
            });
        });
    </script>
    <script>
        // previewFoto
        function previewFoto() {
            const foto = document.querySelector('input[name="foto"]');
            const fotoPreview = document.querySelector('.foto-preview');
            fotoPreview.style.display = 'block';
            const fotoReader = new FileReader();
            fotoReader.readAsDataURL(foto.files[0]);
            fotoReader.onload = function(fotoEvent) {
                fotoPreview.src = fotoEvent.target.result;
                fotoPreview.style.width = '100%';
            }
        }
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script> -->
    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.left-sidebar');
            sidebar.classList.toggle('open'); // Tambahkan kelas 'open'
        });
    </script>
</body>

</html>
