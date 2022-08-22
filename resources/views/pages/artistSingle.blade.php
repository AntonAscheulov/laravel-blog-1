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
        <h2 class="gallery-title">{{$artist->artist_name}} Portfolios</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="gallery-item">
                        <h4><a href="{{route('post.show', $post->slug)}}"><img
                                    src="{{asset('storage/'.$post->image)}}" alt=""></a></h4>
                        <h4><a
                                href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h4>
                        <p>Artist: <a
                                href="{{route('artistSingle', $post->artist->id)}}"> {{$post->getArtistName()}}</a></p>
                        @if($post->category)
                            <h6>
                                <a href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a>
                            </h6>
                        @else
                            <h6>{{$post->getCategoryTitle()}}</h6>
                        @endif
                        <br>
                        <p>{{$post->description}}</p>
                        <br>
                        <a href="{{route('post.show', $post->slug)}}" class="site-btn">view portfolio <img
                                src="/images/icons/arrow-right-black.png"
                                alt=""></a>
                    </div>
                </div>
            @endforeach
        </div>
        <section class="gallery-slider-section">
            @if(sizeof($artist->exhibitions))
                <div class="sp-container">
                    <h2 class="gallery-title">{{$artist->artist_name}} Exhibitions</h2>
                </div>
                <div class="gallery-slider owl-carousel">
                    @foreach($exhibitions as $item)
                        <div class="gallery-item">
                            <a href="{{route('exhibitionSingle', $item->id)}}"><img
                                    src="{{asset('storage/'.$item->image)}}" class="img-" alt=""></a>
                            <h4><a
                                    href="{{route('exhibitionSingle', $item->id)}}">{{$item->title}}</a></h4>
                            <p>Artist: <a
                                    href="{{route('artistSingle', $item->artist->id)}}">{{$item->getArtistName()}}</a><br>{{date('d-m-Y', strtotime($item->date_start))}}
                                - {{date('d-m-Y', strtotime($item->date_end))}}</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="sp-container">
                    <h2 class="gallery-title">{{$artist->artist_name}} has no Exhibitions yet</h2>
                </div>
            @endif
        </section>
    </div>
@endsection
