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

    <!-- App css -->



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
                        <a class="dropdown-item" href="{{route('users.edit',auth()->user()->id)}}"><i class="dripicons-user text-muted mr-2"></i>
                            Profil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('admin.panel.logout')}}"><i class="dripicons-exit text-muted mr-2"></i> Çıkış
                            Yap</a>
                    </div>
                </li>
            </ul>

            {{-- <ul class="list-unstyled topbar-nav mb-0">

                <li>
                    <button class="button-menu-mobile nav-link waves-effect waves-light">
                        <i class="mdi mdi-menu nav-icon"></i>
                    </button>
                </li>

                <li class="hide-phone app-search">
                    <form role="search" class="">
                        <input type="text" placeholder="Arayınız..." class="form-control">
                        <a href=""><i class="fas fa-search"></i></a>
                    </form>
                </li>

            </ul> --}}

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
                            <a href="{{route('users.edit',auth()->user()->id)}}" class=""><i class="mdi mdi-account text-light"></i></a>
                        </li>
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
                        <h4 class="page-title mb-2"><i class="mdi mdi-monitor mr-2"></i>Yönetim Paneli</h4>
                        <div class="">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="{{ route('admin.panel.index') }}">Yönetim Paneli Anasayfa</a></li>
                                @if (!request()->is('admin/panel'))
                                    <li class="breadcrumb-item active"><a href="javascript:void(0);" onclick="goBack()">Geri</a></li>
                                @endif
                            </ol>

                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                        </div>
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
                        <a href="{{ route('admin.panel.index') }}"><i class="mdi mdi-monitor"></i><span>Anasayfa</span></a>
                    </li>

                    <li class="menu-title">Kullanıcı Ayarları</li>

                    <li>
                        <a href="javascript: void(0);"><i class="mdi mdi-apps"></i><span>Kullanıcı Tipleri</span><span
                                class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('channel.list') }}"><span>Kanallar</span></a></li>
                            <li><a href="{{ route('users.list') }}"><span>Kullanıcılar</span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('users.reported.list')}}"><i class="dripicons-warning"></i><span>Şikayetli
                                Kullanıcılar</span></a>
                    </li>

                    <li class="menu-title">Kategoriler</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-cards-playing-outline"></i>
                            <span>Kanal Kategorileri</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="{{ route('categories.list') }}">Kategoriler</a></li>
                            <li><a href="{{ route('categories.create') }}">Kategori Oluştur</a></li>
                        </ul>
                    </li>


                    <li class="menu-title">SPONSORLAR</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-bell-outline"></i>
                            <span>Sponsorlar</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('sponsorlar.index') }}">Sponsorlar</a></li>
                            <li><a href="{{route('sponsorlar.create')}}">Sponsor Oluştur</a></li>
                        </ul>
                    </li>
                    {{-- <li class="menu-title">POSTLAR</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-bell-outline"></i>
                            <span>Postlar</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('sponsorlar.index') }}">Postlar</a></li>
                            <li><a href="{{route('sponsorlar.create')}}">Post Oluştur</a></li>
                        </ul>
                    </li> --}}


                    <li class="menu-title">Bildirimler</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-bell-outline"></i>
                            <span>Bildirimler</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="{{route('notifications.list')}}">Bildirimler</a></li>
                            <li><a href="{{ route('notifications.create') }}">Bildirim Gönder</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Kampanyalar</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fas fa-dollar-sign"></i>
                            <span>Kampanyalar</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="{{route('campaign.index')}}">Kampanyalar</a></li>
                            <li><a href="{{route('campaign.create')}}">Kampanya Oluştur</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Sözleşmeler</li>
                    <li>
                        <a href="{{ route('contract.index') }}">
                            <i class="mdi mdi-book-open-page-variant"></i>
                            <span>Sözleşmeler</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="{{ route('contract.index') }}">Sözleşmeler</a></li>
                            <li><a href="{{ route('contract.create') }}">Sözleşme Oluştur</a></li>
                        </ul>
                    </li>

                    {{-- <li class="menu-title">Bloglar</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="dripicons-blog"></i>
                            <span>Bloglar</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="blogs.html">Bloglar</a></li>
                            <li><a href="blog-create.html">Blog Oluştur</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="dripicons-blog"></i>
                            <span>Blog Kategorileri</span>
                            <span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">

                            <li><a href="blog-categories.html">Kategoriler</a></li>
                            <li><a href="blog-category-create.html">Kategori Oluştur</a></li>
                        </ul>
                    </li> --}}

                </ul>
            </div>
            <!-- end left-sidenav-->
