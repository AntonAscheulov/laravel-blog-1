@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Портфолио
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
                    <h3 class="box-title">Все портфолио</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('admin.posts.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Автор</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Обложка</th>
                            <th>Фотографии</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->getArtistName()}}</td>
                                <td>{{$post->getCategoryTitle()}}</td>
                                <td>{{$post->getTagsTitles()}}</td>
                                <td>
                                    <img src="{{asset('storage/'.$post->image)}}" alt="" class="img-responsive"
                                         width="150">
                                </td>
                                <td>
                                    <div class="carousel slide media-carousel" id="media">
                                        <div class="carousel-inner">
                                            <div class="item  active">
                                                <div class="row">
                                                    <div class="col-md-auto">
                                                        <a class="thumbnail" href="#"><img alt=""
                                                                                           src="{{asset('storage/')}}"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
                                        <a data-slide="next" href="#media" class="right carousel-control">›</a>
                                    </div>
                                </td>
                                <td><a href="{{route('admin.posts.edit', $post->id)}}" class="fa fa-pencil"></a>
                                    <form method="POST" action="{{route('admin.posts.delete', $post->id)}}">
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
                    {{$posts->links()}}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
