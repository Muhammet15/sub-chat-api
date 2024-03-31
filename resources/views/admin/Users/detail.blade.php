@extends('admin.layouts.master')
@section('title')
    Anasayfa
@endsection
@section('body')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">User Detail</h4>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="device_uid">Device uid</label>
                                        <input type="text" class="form-control" id="device_uid" name="device_uid" value="{{$user->device_uid}}" placeholder="device uid" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="device_name">Device name</label>
                                        <input type="text" class="form-control" id="device_name" name="device_name" value="{{$user->device_name}}" placeholder="device name" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="subscription_status">Subscription Status</label>
                                        <input type="text" class="form-control" id="subscription_status" name="subscription_status" value="{{$user->subscription_status ? 'Active' : 'Passive'}}" placeholder="subscription_status" readonly>
                                    </div>
                                </div>
                                <h4 class="mt-0 header-title">Subscription Detail</h4>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="product">Subscription Name</label>
                                        <input type="text" class="form-control" id="product" name="product" value="{{$user->activeSubscription()->product->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="chat_limit">Subscription Remaining Chat Credit</label>
                                        <input type="text" class="form-control" id="chat_limit" name="chat_limit" value="{{$user->activeSubscription()->chat_credit}}" readonly>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="price">Subscription Chat Price</label>
                                        <input type="text" class="form-control" id="price" name="price" value="{{$user->activeSubscription()->product->price}} ₺" readonly>
                                    </div>
                                </div>
                            </div>


                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container -->

    <footer class="footer text-center text-sm-left">
        &copy; 2023 Tvizy <span class="text-muted d-none d-sm-inline-block float-right">Tüm Hakları Tvizy
            Tarafından Saklıdır.</span>
    </footer>
</div>
@endsection
@section('style')
<link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">

<!-- App css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

@endsection
@section('scripts')
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>

<!--Wysiwig js-->
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-editor.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

@endsection
