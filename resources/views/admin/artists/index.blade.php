@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Авторы
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
                    <h3 class="box-title">Все авторы</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.artists.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя автора</th>
                            <th>Проффессия</th>
                            <th>Краткое описание</th>
                            <th>Полное описание</th>
                            <th>Аватар</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($artists as $artist)
                            <tr>
                                <td>{{$artist->id}}</td>
                                <td>{{$artist->artist_name}}</td>
                                <td>{{$artist->artist_profession}}</td>
                                <td>{{$artist->artist_short_description}}</td>
                                <td>{{$artist->artist_full_description}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$artist->artist_avatar)}}" alt="" class="img-responsive" width="150">
                                </td>
                                <td><a href="{{route('admin.artists.edit', $artist->id)}}" class="fa fa-pencil"></a>
                                    <form method="POST" action="{{route('admin.artists.delete', $artist->id)}}">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="delete">
                                            <a class="fa fa-remove"></a>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tfoot>
                    </table>
                    {{$artists->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
