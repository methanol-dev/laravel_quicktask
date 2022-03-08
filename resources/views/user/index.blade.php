@extends('layouts.admin')

@section('title')
<title>{{ trans('user.users') }}</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ trans('user.users_table') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('users.create') }}" class="btn btn-success float-right m-2"><i
                            class="fa fa-user-plus" aria-hidden="true"></i></a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ trans('user.full_name') }}</th>
                                <th scope="col">{{ trans('user.email') }}</th>
                                <th scope="col">{{ trans('user.user_name') }}</th>
                                <th scope="col">{{ trans('user.admin') }}</th>
                                <th scope="col">{{ trans('user.active') }}</th>
                                <th scope="col">{{ trans('user.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td>
                                    <a href="{{ route('users.show', [1]) }}" class="btn btn-info m-2">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('users.edit', [1]) }}" class="btn btn-primary m-2">
                                        <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('users.destroy', [1]) }}" class="btn btn-danger m-2">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('task.index', [1]) }}" class="btn btn-secondary m-2">
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
