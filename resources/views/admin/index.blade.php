@extends('superadmin.layouts.master')
@section('title')
    Anasayfa
@endsection
@section('body')
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body new-user order-list">
                            <div class="table-responsive">
                                {{-- <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-top-0"></th>
                                            <th class="border-top-0">Adı Soyadı</th>
                                            <th class="border-top-0">Ülke</th>
                                            <th class="border-top-0">Telefon</th>
                                            <th class="border-top-0">E-Posta</th>
                                            <th class="border-top-0">Telefon Onayı</th>
                                            <th class="border-top-0">Aktif</th>
                                            <th class="border-top-0">İşlem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($newUsers as $user)
                                        <tr>
                                            <td>
                                                <img class="rounded-circle" src="{{$user->image}}" alt="user">
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>{{ $user->address->first()->country->name ?? null}}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->phone_verified_at === null)
                                                <span class="badge badge-boxed badge-soft-warning">Onay Bekliyor</span>
                                                @else
                                                <span class="badge badge-boxed badge-soft-success">Onaylandı</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge badge-boxed badge-soft-success">Aktif</span>
                                            </td>
                                            <td>
                                                {{-- <a href="{{route('users.edit',$user['id'])}}" class="btn btn-sm btn-success tippy-btn"
                                                title="Kullanıcı Bilgileri" data-tippy-interactive="true">
                                                <i class="fas fa-eye"></i>
                                            </a> --}}
                                            {{-- <a href="{{route('users.delete',$user['id'])}}"class="btn btn-sm btn-danger"
                                            title="Kullanıcı Bilgileri" data-tippy-interactive="true">
                                            <i class="fas fa-trash-alt"></i></a> --}}

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}

                            </div>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div><!-- container -->
        <footer class="footer text-center text-sm-left">
            &copy; 2023 Muhammet <span class="text-muted d-none d-sm-inline-block float-right">Tüm Hakları
                Tarafından Saklıdır.</span>
        </footer>
    </div>
    <!-- end page content -->
@endsection
@section('style')
<link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">
<link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">

<!-- DatePicker Plugins css -->
<link href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

<!-- App css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>

<script src="{{ asset('assets/pages/jquery.dashboard.init.js') }}"></script>

<!--Wysiwig js-->
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-editor.init.js') }}"></script>

<!-- Datepicker Plugins js -->
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.forms-advanced.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

@endsection
