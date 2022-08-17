@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Выставки
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
                    <h3 class="box-title">Все выставки</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.exhibitions.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Автор</th>
                            <th>Описание</th>
                            <th>Дата начала</th>
                            <th>Дата окончания</th>
                            <th>Обложка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($exhibitions as $exhibition)
                            <tr>
                                <td>{{$exhibition->id}}</td>
                                <td>{{$exhibition->title}}</td>
                                <td>{{$exhibition->getArtistName()}}</td>
                                <td>{{$exhibition->description}}</td>
                                <td>{{$exhibition->date_start}}</td>
                                <td>{{$exhibition->date_end}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$exhibition->image)}}" alt="" class="img-responsive" width="150">
                                </td>
                                <td><a href="{{route('admin.exhibitions.edit', $exhibition->id)}}" class="fa fa-pencil"></a>
                                    <form method="POST" action="{{route('admin.exhibitions.delete', $exhibition->id)}}">
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
                    {{$exhibitions->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
