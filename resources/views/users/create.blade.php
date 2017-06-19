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
                <div class="portlet-body">
                    {!! Form::open(['route' => 'users.store','method' => 'post','class' => 'form-group','role' => 'form']) !!}
                        <div class="form-group col-md-4">
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            {!! Form::label('email','E-Mail',['class' => 'control-label visible-ie8 visible-ie9']) !!}
                            {!! Form::email('email',null,['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Email-Address','required']) !!}
                        </div>
                    <div class="form-group col-md-4">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        {!! Form::label('name','E-Mail',['class' => 'control-label visible-ie8 visible-ie9']) !!}
                        {!! Form::text('name',null,['class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Username','required']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection