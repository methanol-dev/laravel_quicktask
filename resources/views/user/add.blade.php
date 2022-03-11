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
                    <h1 class="m-0">{{ trans('user.add_user') }}</h1>
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
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first_name">{{ trans('user.first_name') }}</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">{{ trans('user.last_name') }}</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ trans('user.email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user_name">{{ trans('user.user_name') }}</label>
                                    <input type="text" class="form-control" id="user_name" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ trans('user.password') }}</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="active" name="isActive">
                                    <label class="form-check-label" for="active">{{ trans('user.active') }}</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="admin" name="isAdmin">
                                    <label class="form-check-label" for="admin">{{ trans('user.admin') }}</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ trans('user.submit') }}</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
