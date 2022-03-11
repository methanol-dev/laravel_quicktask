@extends('layouts.admin')

@section('title')
    <title>{{ trans('task.task') }}</title>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ trans('task.task_table') }}</h1>
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
                        <a href="{{ route('task.create', ['user' => $user]) }}" class="btn btn-success float-right m-2"><i
                                class="fa fa-user-plus" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ trans('user.full_name') }}</th>
                                    <th scope="col">{{ trans('task.task_name') }}</th>
                                    <th scope="col">{{ trans('task.description') }}</th>
                                    <th scope="col">{{ trans('task.done') }}</th>
                                    <th scope="col">{{ trans('task.action') }}</th>
                                </tr>
                            </thead>
                            <?php $i = 0; ?>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th scope="row">
                                            <?php echo ++$i; ?>
                                        </th>
                                        <td>{{ $task->full_name }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->isDone ? trans('home.Done') : trans('home.Not_Done') }}</td>
                                        <td>
                                            <a href="{{ route('task.show', [
                                                'task' => $task->id,
                                                'user' => $user,
                                            ]) }}"
                                                class="btn btn-info m-2">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('task.edit', [
                                                'task' => $task->id,
                                                'user' => $user,
                                            ]) }}"
                                                class="btn btn-primary m-2">
                                                <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                            </a>
                                            <form
                                                action="{{ route('task.destroy', [
                                                    'task' => $task->id,
                                                    'user' => $user,
                                                ]) }}"
                                                method="post" class="d-inline"
                                                onsubmit="return confirm('{{ trans('Delete') }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger m-2">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $tasks->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
