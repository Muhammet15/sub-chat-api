<head>
    <meta charset="utf-8" />
    <title>@yield('title') Admin Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Yönetim Paneli" name="description" />
    <meta content="panel" name="author" />
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- App favicon -->
    <!-- App favicon -->


    @yield('style')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">


</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="#" class="logo">
                    <span>

                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topbar-nav float-right mb-0">
                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown"
                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/logo-sm.png') }}" alt="profile-user" class="rounded-circle" />
                        <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('admin.panel.logout')}}"><i class="dripicons-exit text-muted mr-2"></i> Çıkış
                            Yap</a>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper-img">
        <div class="page-wrapper-img-inner">
            <div class="sidebar-user media">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="user" class="rounded-circle img-thumbnail mb-1">
                <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                <div class="media-body">
                    <h5 class="text-light text-left"> </h5>
                    <ul class="list-unstyled list-inline mb-0 mt-2">
                        <li class="list-inline-item">
                            <a href="{{route('admin.panel.logout')}}" class=""><i class="mdi mdi-power text-danger"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title mb-2">Yönetim Paneli</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->
        </div>
    </div>

    <div class="page-wrapper">
        <div class="page-wrapper-inner">

            <!-- Left Sidenav -->
            <div class="left-sidenav">

                <ul class="metismenu left-sidenav-menu" id="side-nav">

                    <li>
                        <a href="{{ route('admin.index') }}"><span>Home</span></a>
                    </li>

                    <li class="menu-title">Users and Subscriptions</li>

                    <li>
                        <a href="javascript: void(0);"><span>Users and Subscriptions </span><span
                                class="menu-arrow"><i class="bi bi-record"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('users.list') }}"><span>Users</span></a></li>
                            <li><a href="{{ route('subscriptions.list') }}"><span>Subscriptions</span></a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- end left-sidenav-->
