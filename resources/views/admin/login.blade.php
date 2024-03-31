<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Süper Admin Giriş</title>

    <!-- App favicon -->


<!-- App css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
</head>
    <body class="account-body">

        <!-- Log In page -->
        <div class="row vh-100">
            <div class="col-lg-3  pr-0">
                <div class="card mb-0 shadow-none">
                    <div class="card-body">

                        <div class="px-3">
                            <div class="media">

                                <div class="media-body ml-3 align-self-center">
                                    <h4 class="mt-0 mb-1">Admin Giriş</h4>
                                    <p class="text-muted mb-0">Giriş Yapmak İçin Email ve Şifre giriniz.</p>
                                </div>
                            </div>

                            <form class="form-horizontal my-4" action="{{ route('admin.login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="email" name="email" value="admin@admin.com" placeholder="Enter email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Şifre</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" value="password" id="userpassword" placeholder="Enter password">
                                    </div>
                                </div>



                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Giriş Yap<i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-9 p-0 d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center">
                    <div class="account-title text-white text-center">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" class="thumb-sm">
                        <h4 class="mt-3">Süper Admin Paneli</h4>
                        <div class="border w-25 mx-auto border-primary"></div>
                        <h1 class=""></h1>


                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->


        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>
</html>
