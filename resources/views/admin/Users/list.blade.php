@extends('superadmin.layouts.master')
@section('title')
    Anasayfa
@endsection
@section('body')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="header-title">Tüm Kullanıcılar</h5>
                            <a href="{{route('users.create')}}" class="btn btn-outline-success btn-xs">
                                Kullanıcı Oluştur
                            </a>
                        </div>
                        <div class="">
                            <table id="datatable2" class="table dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Ad Soyad</th>
                                        <th>Telefon</th>
                                        <th>E-Posta</th>
                                        <th>Telefon Onayı</th>
                                        <th>Durum</th>
                                        <th>İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as  $user )
                                    <tr>
                                        <td>
                                            <img src="{{$user['image']}}"
                                                class="wh40-rounded" alt="">
                                        </td>
                                        <td>{{$user['name']}}</td>
                                        <td>{{$user['phone']}}</td>
                                        <td>{{$user['email']}}</td>
                                        <td>
                                            @if ($user['phone_verified_at'] === null && $user['type'] === 0)
                                                <span class="badge badge-boxed badge-soft-warning">Onay Bekliyor</span>
                                            @elseif ($user['type'] !== 0)
                                            <span class="badge badge-boxed badge-soft-info">   Onaya Gerek Yok</span>

                                            @else
                                                <span class="badge badge-boxed badge-soft-success">Onaylandı</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $user['active'] ? 'success' : 'warning' }} light">
                                                {{ $user['active'] ? 'Aktif' : 'Pasif' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{route('users.edit',$user['id'])}}" class="btn btn-sm btn-success tippy-btn"
                                                title="Kullanıcı Bilgileri" data-tippy-interactive="true">
                                                <i class="dripicons-user-id" style="line-height: inherit;"></i>
                                            </a>

                                            <a href="{{route('users.follow.channel',$user->id)}}" class="btn btn-sm btn-primary tippy-btn"
                                                title="Takip Ettiği Kanallar" data-tippy-interactive="true">
                                                <i class="mdi mdi-television-classic" style="line-height: inherit;"></i>
                                            </a>

                                            {{-- <a href="{{route('users.follow.production',$user->id)}}" class="btn btn-sm btn-info  tippy-btn"
                                                title="Takip Ettiği Yapımlar" data-tippy-interactive="true">
                                                <i class="fas fa-clipboard-list"></i>
                                            </a> --}}

                                            <a href="{{route('users.delete',$user->id)}}" class="btn btn-sm btn-danger tippy-btn"
                                            title="Kullanıcıyı Sil" data-tippy-interactive="true">
                                                <i class="fas fa-trash-alt" style="line-height: inherit;"></i>
                                            </a>

                                            {{-- <a href="javascript:;" class="btn btn-sm btn-warning tippy-btn"
                                            title="Kullanıcıyı Pasif Et" data-tippy-interactive="true">
                                                <i class="fas fa-search-minus"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div><!-- container -->
    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @endsection
    <footer class="footer text-center text-sm-left">
        &copy; 2023   <span class="text-muted d-none d-sm-inline-block float-right">Tüm Hakları
            Tarafından Saklıdır.</span>
    </footer>

</div>

@section('style')
<link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">

<!-- DataTables -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- App css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('scripts')
<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Buttons examples -->
<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.datatable.init.js') }}"></script>

<!-- Tooltip Popovers -->
<script src="{{ asset('assets/plugins/tippy/tippy.all.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.tooltipster.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>

@endsection
