@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить портфолио
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('admin.posts.store')}}" enctype="multipart/form-data" method="POST">
                @csrf
                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем портфолио</h3>
                        @include('admin.errors')
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control"
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
                                <label for="exampleInputFile">Обложка</label>
                                <input type="file" name="image" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Фотографии</label>
                                <input type="file" name="photos[]"  accept="image/*" multiple>
                            </div>

                            <div class="form-group">
                                <label>Категория</label>
                                <select name="category_id" class="form-control select2" style="width: 100%;"
                                        data-placeholder="Выберите категорию">
                                    @foreach($categories as $id => $value)
                                        <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Теги</label>
                                <select name="tags[]" class="form-control select2" multiple="multiple"
                                        data-placeholder="Выберите теги" style="width: 100%;">
                                    @foreach($tags  as $id => $value)
                                        <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" class="minimal" value="1" name="is_recommended">
                                </label>
                                <label>
                                    Рекомендовать
                                </label>
                            </div>

                            <!-- checkbox -->
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" value="1" class="minimal" name="is_published">
                                </label>
                                <label>
                                    Опубликовать
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Краткое описание</label>
                                <textarea id="" cols="10" rows="5" class="form-control"
                                          name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Полный текст</label>
                                <textarea id="" cols="30" rows="10" class="form-control"
                                          name="content"></textarea>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('admin.posts.index')}} " class="btn btn-default">Назад</a>
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
