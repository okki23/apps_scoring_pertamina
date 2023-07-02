<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">  
      <!-- Scripts -->
    <title>Scoring Managment Apps - Pertamina</title>
    <meta charset="utf-8" />
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
</head>

<body class="bg-white">
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

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">Scoring Apps </h1>
                                        {{-- <p>Please login to your account.</p> --}}
                                        <form method="POST" action="{{ route('login') }}">
                                          @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <input type="password" class="form-control" name="password" placeholder="Password" />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-success text-uppercase"> Sign In</button>
                                                    {{-- <a href="index.html" class="btn btn-success text-uppercase">Sign In</a> --}}
                                                </div>
                                                {{-- <div class="col-12  mt-3">
                                                    <p>Don't have an account ?<a href="auth-register.html"> Sign Up</a></p>
                                                </div> --}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiT3NlJeAxNTg12V35vnprnhsI7FbiZ2vESt0LP11J6iiUaR0l9vTYFCoItimJez_oTciXjluGGC4EXVG1y_gWTyl0pms1ZaXSL8c4Sr79YkWTKle20kslkZPPF-9OdFdRkRMLYqFasrumudN_flTkXPjC6jmPoQj7DZw5cmywSPCWViNeiiOmntsPtMw/s1920/PERTAMINA.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app --> 

    <!-- plugins -->
    <script src="{{ asset('assets/js/vendors.js') }}"></script> 
    <!-- custom app -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body> 
</html>
 