@extends('layout')

@section('content')
    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-slider owl-carousel">
            @foreach($exhibitions as $exhibition)
            <div class="hs-item">
                <div class="hs-bg set-bg sm-overlay" data-setbg="{{asset('storage/'.$exhibition->image)}}"></div>
                <div class="sp-container">
                    <div class="hs-text">
                        <h2>The Look<br>Gallery</h2>
                        <p>{{$exhibition-> title}}<br>{{$exhibition-> date_start}} - {{$exhibition-> date_end}}</p>
                        <a href="#" class="site-btn sb-big">Read More <img src="images/icons/arrow-right-black.png"
                                                                           alt=""></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Hero section end -->

    <!-- Gallery section -->
    <section class="gallery-section">
        <div class="sp-container">
            <div class="row">
                <div class="gallery-text">
                    <h2>“The camera makes you forget you’re there. It’s not like you are hiding but you forget, you
                        are just looking so much.”</h2>
                    <p>Pellentesque dictum nisl in nibh dictum volutpat nec a quam. Vivamus suscipit nisl quis nulla
                        pretium, vitae ornare leo sollicitudin. Aenean quis velit pulvinar, pellentesque neque vel,
                        laoreet orci. Suspendisse potenti. </p>
                </div>
                @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="gallery-item">
                        <h4><a href="{{route('post.show', $post->slug)}}"><img
                                src="{{asset('storage/'.$post->image)}}" alt=""></a></h4>
                        <h4><a
                                href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h4>
                        <p>Artist: John Doe</p>
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
        <button type="button" class="btn btn-dark btn-lg btn-block text-uppercase">see all portfolios</button>
        <br>
    </section>
    <!-- Gallery section end -->
@endsection
