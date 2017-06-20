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
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Users </span>
                    </div>
                    <div class="actions">
                        <div class="btn-group pull-right">
                            <a href="{{route('users.create')}}" class="btn sbold green">Add
                                New <i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">

                    {!! $table !!}
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection