@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить выставку
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('admin.exhibitions.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем выстовку</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" name="title" value="{{old('artist_name')}}" class="form-control"
                                       id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Автор</label>
                                <select name="artist_id" class="form-control select2" style="width: 100%;"
                                        data-placeholder="Выберите автора">
                                    @foreach($artists as $id => $value)
                                        <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Описание</label>
                                    <textarea id="" cols="10" rows="5" class="form-control"
                                              name="description"></textarea>
                                </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Дата начала</label>
                                <input type="date" name="date_start" value="{{old('date_start')}}" class="form-control"
                                       id="exampleInputEmail1" placeholder="">
                            </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата окончания</label>
                                    <input type="date" name="date_end" value="{{old('date_end')}}" class="form-control"
                                           id="exampleInputEmail1" placeholder="">
                                </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Обложка</label>
                                <input type="file" name="image" id="exampleInputFile">
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('admin.exhibitions.index')}} " class="btn btn-default">Назад</a>
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
