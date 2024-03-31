@extends('admin.layouts.master')
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
                        <div class="">
                            <table id="datatable2" class="table dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Device uuid</th>
                                        <th>Device name</th>
                                        <th>Subscription</th>
                                        <th>Admin</th>
                                        <th>Process</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as  $user )
                                    <tr>
                                        <td>{{$user['id']}}</td>
                                        <td>{{$user['name'] ?? '-'}}</td>
                                        <td>{{$user['device_uuid']}}</td>
                                        <td>{{$user['device_name']}}</td>
                                        <td>
                                            <span class="badge badge-{{ $user['subscription_status'] ? 'success' : 'warning' }} light">
                                                {{ $user['subscription_status'] ? 'Active' : 'Passive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $user['is_admin'] ? 'success' : 'warning' }} light">
                                                {{ $user['is_admin'] ? 'Admin' : 'User' }}
                                            </span>
                                        </td>
                                        <td>
                                            @if (!$user['is_admin'])
                                            <a href="{{route('users.detail',$user['id'])}}" class="btn btn-sm btn-success tippy-btn"
                                                title="User and Subscription Detail" data-tippy-interactive="true">
                                                <i class="dripicons-user-id" style="line-height: inherit;"></i>
                                            </a>
                                            @endif
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
        &copy; 2023  Muhmmet  <span class="text-muted d-none d-sm-inline-block float-right">Tüm Hakları Muhmmet
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
