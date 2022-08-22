@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить автора
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('admin.artists.update', $artist->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Обновляем автора</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя</label>
                                <input name="artist_name" type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder=""
                                       value="{{$artist->artist_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Профессия</label>
                                <input name="artist_profession" type="text" class="form-control" id="exampleInputEmail1"
                                       placeholder=""
                                       value="{{$artist->artist_profession}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Аватар</label>
                                <br>
                                <img src="{{asset("storage/". $artist->artist_avatar)}}" alt="" class="img-responsive"
                                     width="200">
                                <br>
                                <input type="file" id="exampleInputFile" name="artist_avatar">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Краткое описание</label>
                                <textarea id="" cols="10" rows="5" class="form-control"
                                          name="artist_short_description">{{$artist->artist_short_description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Полное описание</label>
                                <textarea id="" cols="10" rows="5" class="form-control"
                                          name="artist_full_description">{{$artist->artist_full_description}}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                        <div class="box-footer">
                            <a href="{{route('admin.artists.index')}} " class="btn btn-default">Назад</a>
                            <button class="btn btn-warning pull-right">Изменить</button>
                        </div>
                        <!-- /.box-footer-->
                    </div>
                    <!-- /.box -->
            </form>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
