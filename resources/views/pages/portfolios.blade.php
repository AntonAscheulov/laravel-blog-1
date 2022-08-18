@extends('layout')

@section('content')
    <section class="artists-page page-warp">
        <div class="sp-container">
            <div class="page-title">
                <h2>Portfolios</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed
                    sagittis.</p>
            </div>
            <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="gallery-item">
                        <h4><a href="{{route('post.show', $post->slug)}}"><img
                                    src="{{asset('storage/'.$post->image)}}" alt=""></a></h4>
                        <h4><a
                                href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h4>
                        <p>Artist: <a href="{{route('artistSingle', $post->artist->id)}}">{{$post->getArtistName()}}</a></p>
                        @if($post->category)
                            <h6>
                                <a href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a>
                            </h6>
                        @else
                            <h6>{{$post->getCategoryTitle()}}</h6>
                        @endif
                        <br>
                        <a href="{{route('post.show', $post->slug)}}" class="site-btn">view portfolio <img src="images/icons/arrow-right-black.png"
                                                                                                           alt=""></a>
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>
        <span class="pagination pagination-lg">{{$posts->links()}}</span>
    </section>
    <!-- Artists page end -->
@endsection
