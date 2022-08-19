@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Комментарии
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Все комментарии</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Текст</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->text}}</td>
                            <td>
                            @if($comment->is_published == 1)
                                    <a href="{{route('admin.commentsToggle', $comment->id)}}" class="fa fa-lock"></a>
                            @else
                                    <a href="{{route('admin.commentsToggle', $comment->id)}}" class="fa fa-thumbs-o-up"></a>
                            @endif
                                <form method="POST" action="{{route('admin.commentsDelete', $comment->id)}}">
                                    @csrf
                                    @method("DELETE")
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="delete">
                                        <a class="fa fa-remove"></a>
                                    </button>
                                </form>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
