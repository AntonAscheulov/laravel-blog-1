@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить выставку
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('admin.exhibitions.update', $exhibition->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Default box -->
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" name="title" value="{{$exhibition->title}}" class="form-control"
                                       id="exampleInputEmail1" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Автор</label>
                                <select name="artist_id" class="form-control select2" style="width: 100%;"
                                        data-placeholder="Выберите категорию">
                                    @foreach($artists as $id => $value)
                                        @if($id == $exhibition->artist_id)
                                            <option value="{{$id}}" selected>{{$value}}</option>
                                        @else
                                            <option value="{{$id}}">{{$value}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Описание</label>
                                    <textarea id="" cols="10" rows="5" class="form-control"
                                              name="description">{{$exhibition->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата начала</label>
                                    <input type="date" name="date_start" value="{{$exhibition->date_start}}" class="form-control"
                                           id="exampleInputEmail1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата окончания</label>
                                    <input type="date" name="date_end" value="{{$exhibition->date_end}}" class="form-control"
                                           id="exampleInputEmail1" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Обложка</label>
                                    <br>
                                    <img src="{{asset("storage/". $exhibition->image)}}" alt="" class="img-responsive" width="200">
                                    <br>
                                    <input type="file" name="image" id="exampleInputFile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="{{route('admin.exhibitions.index')}} " class="btn btn-default">Назад</a>
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
