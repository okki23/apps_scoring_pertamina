<!DOCTYPE html>
<html lang="en">


<head>
  <title>Scoring Management Apps - Pertamina</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/pertamina_icon.png') }}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors.css') }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <!-- plugins -->
    <script src="{{ asset('assets/js/vendors.js') }}"></script>

    <!-- custom app -->
    <script src="{{ asset('assets/js/app.js') }} "></script>
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ asset('assets/img/loader/loader.svg') }}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->
            <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">

                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ asset('assets/img/pertamina_logo.png') }} " class="img-fluid logo-desktop" alt="logo" />
                            <img src="{{ asset('assets/img/pertamina_logo.png') }} " class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">
                            <ul class="navbar-nav nav-left">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                        <i class="ti ti-align-right"></i>
                                    </a>
                                </li>  
                            </ul>
                            <ul class="navbar-nav nav-right ml-auto">
                               
                                
                                <li class="nav-item dropdown user-profile">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="assets/img/avtar/02.jpg" alt="avtar-img">
                                        <span class="bg-success user-status"></span>
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                    <h4 class="text-white mb-0">Administrator</h4> 
                                                </div>
                                                <a href="#" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                                class="zmdi zmdi-power"></i></a>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                         
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            {{-- <li class="nav-static-title">Personal</li> --}}
                            <li><a href="{{ route('home') }}" aria-expanded="false"><i class="nav-icon ti ti-desktop"></i><span class="nav-title">Dashboard</span></a> </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon ti ti-server"></i>
                                    <span class="nav-title">Master</span>
                                    {{-- <span class="nav-label label label-danger">9</span> --}}
                                </a>
                                <ul aria-expanded="false">
                                    <li class="active"> <a href='{{ route('pegawai') }}'>Pegawai</a> </li>
                                    <li> <a href='{{ route('fungsi') }}'>Fungsi</a> </li>
                                    <li> <a href='{{ route('jeniskerja') }}'>Jenis Pekerjaan</a> </li>
                                    <li> <a href='{{ route('jenisor') }}'>Jenis Olahraga</a> </li>
                                    <li> <a href='{{ route('kategori') }}'>Kategori</a> </li> 
                                    <li> <a href='{{ route('lokasi') }}'>Lokasi</a> </li> 
                                </ul> 
                            </li>
                            <li>
                              <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                  <i class="nav-icon ti ti ti-files"></i>
                                  <span class="nav-title">Transaksi</span> 
                              </a>
                              <ul aria-expanded="false">
                                  <li class="active"> <a href='{{ route('trans_event') }}'>Transaction Logs</a> </li> 
                              </ul>
                           </li>
                           <li>
                            <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                <i class="nav-icon ti ti ti-agenda"></i>
                                <span class="nav-title">Report</span> 
                            </a>
                            <ul aria-expanded="false">
                                <li class="active"> <a href='{{ route('report_individu') }}'>Report Individu</a> </li> 
                                <li class="active"> <a href='{{ route('report_all') }}'>Report All</a> </li> 
                            </ul>
                          </li>
                                        
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-lg-flex flex-nowrap align-items-center">
                                    <div class="page-title mr-4 pr-4">
                                        {{-- <h1>Dashboard</h1> --}}
                                    </div>
                                     
                                    
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- Notification -->
                        <div class="row">
                            
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-sm-12">
                              @yield('content') 
                            </div>
                        </div>
                       
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
            {{-- <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p>&copy; Copyright 2019. All rights reserved.</p>
                    </div>
                   <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                    </div>
                </div>
            </footer> --}}
            <!-- end footer -->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

</body>


</html>