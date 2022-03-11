@extends('layouts.admin')

@section('title')
    <title>{{ trans('task.show_task') }}</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ trans('task.show_task') }}</h1>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">{{ trans('task.task_name') }}</label>
                                    <input type="text" class="form-control" id="name" value="{{ $task->name }}"
                                        name="name" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ trans('task.description') }}</label>
                                    <input type="text" class="form-control" id="description"
                                        value="{{ $task->description }}" name="description" readonly>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="isDone"
                                        {{ $task->isDone ? 'checked' : '' }}
                                        name="isDone">
                                    <label class="form-check-label" for="isDone">{{ trans('task.done') }}</label>
                                </div>
                            </div>
                        </div>
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
