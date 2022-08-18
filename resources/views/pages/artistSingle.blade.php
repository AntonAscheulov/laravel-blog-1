@extends('layout')

@section('content')
    <div class="sp-container">
        <div class="page-title">
            <h2>{{$artist->artist_name}}</h2>
        </div>
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">{{ $artist->artist_profession }}</h2>
            <br>
            <p class="lead">{{ $artist->artist_full_description }}</p>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="{{asset('storage/'.$artist->artist_avatar)}}" alt="">
        </div>
    </div>
        <br>
        <h2 class="text-uppercase">{{$artist->artist_name}} Portfolios</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="gallery-item">
                        <h4><a href="{{route('post.show', $post->slug)}}"><img
                                    src="{{asset('storage/'.$post->image)}}" alt=""></a></h4>
                        <h4><a
                                href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h4>
                        <p>Artist: <a href="{{route('artistSingle', $post->artist->id)}}"> {{$post->getArtistName()}}</a></p>
                        @if($post->category)
                            <h6>
                                <a href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a>
                            </h6>
                        @else
                            <h6>{{$post->getCategoryTitle()}}</h6>
                        @endif
                        <br>
                        <a href="{{route('post.show', $post->slug)}}" class="site-btn">view portfolio <img src="/images/icons/arrow-right-black.png"
                                                                                                           alt=""></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
