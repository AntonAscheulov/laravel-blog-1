@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить автора
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('admin.artists.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем автора</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя</label>
                                <input type="text" name="artist_name" value="{{old('artist_name')}}" class="form-control"
                                       id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Профессия</label>
                                <input type="text" name="artist_profession" value="{{old('artist_profession')}}" class="form-control"
                                       id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Аватар</label>
                                <input type="file" name="artist_avatar" id="exampleInputFile">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Краткое описание</label>
                                <textarea id="" cols="10" rows="5" class="form-control"
                                          name="artist_short_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Полное описание</label>
                                <textarea id="" cols="10" rows="5" class="form-control"
                                          name="artist_full_description"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('admin.artists.index')}} " class="btn btn-default">Назад</a>
                        <button class="btn btn-success pull-right">Добавить</button>
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
