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

                    <table class="table table-striped table-bordered table-hover table-checkable order-column"
                           id="sample_1" width="100%">
                        <thead>
                        <tr>
                            <th width="30%"> Username</th>
                            <th width="30%"> Email</th>
                            <th width="15%"> Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr class="odd gradeX">
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td class="">
                                    <form style="float:right;" method="POST" class="form-inline" action="{{route('users.destroy', $user->id)}}" onsubmit="return confirm('Are you sure?')">
                                        {{method_field('DELETE')}}
                                        {{csrf_field()}}

                                        <a href="{{ route('users.edit', $user->id) }}"
                                           class="btn btn-icon-only btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-icon-only btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
@endsection