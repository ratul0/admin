@extends('layouts.app')
@section('content')
    {{--<h1 class="page-title">Users Management</h1>--}}
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-plus font-dark"></i>
                        <span class="caption-subject bold uppercase"> Add New User </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group pull-right">
                            <a href="{{route('users.index')}}" class="btn sbold red"><i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                    {!! $form !!}
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection