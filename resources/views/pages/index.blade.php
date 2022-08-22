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
                            <p>{{$exhibition-> title}}<br>{{date('d-m-Y', strtotime($exhibition->date_start))}}
                                - {{date('d-m-Y', strtotime($exhibition->date_end))}}</p>
                            <a href="{{route('exhibitionSingle', $exhibition->id)}}" class="site-btn sb-big">Read More <img src="images/icons/arrow-right-black.png"
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
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <p>Pellentesque dictum nisl in nibh dictum volutpat nec a quam. Vivamus suscipit nisl quis nulla
                            pretium, vitae ornare leo sollicitudin. Aenean quis velit pulvinar, pellentesque neque vel,
                            laoreet orci. Suspendisse potenti. Pellentesque dictum nisl in nibh dictum volutpat nec a
                            quam. Vivamus suscipit nisl quis nulla
                            pretium, vitae ornare leo sollicitudin. Aenean quis velit pulvinar, pellentesque neque vel,
                            laoreet orci. Suspendisse potenti.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="">
                                    <div class="d-flex">
                                        <h4 class="flex-grow-1">{{WeatherFacade::coordinates()->getCityName()}}</h4>
                                    </div>

                                    <div class="d-flex flex-column temp mt-5 mb-3">
                                        <h1 class="mb-1 font-weight-bold"
                                            id="heading">{{WeatherFacade::temperature()->getCurrentTemperature()}}
                                            &degC </h1>
                                        <h4>{{WeatherFacade::temperature()->getDescription()}} </h4>
                                    </div>
                                    <div class="d-flex">
                                        <div class="temp-details flex-grow-1">
                                            <p class="my-1">Рассвет:
                                                <span>{{WeatherFacade::time()->getSunriseTime()}}</span>
                                            </p>

                                            <p class="my-1">Влажность:
                                                <span> {{WeatherFacade::temperature()->getHumidity()}}%</span>
                                            </p>

                                            <p class="my-1">Закат:
                                                <span>{{WeatherFacade::time()->getSunsetTime()}}</span>
                                            </p>
                                        </div>
                                        <div>
                                            <img src="{{WeatherFacade::temperature()->getIcon()}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
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
                            <a href="{{route('post.show', $post->slug)}}" class="site-btn">view portfolio <img
                                    src="/images/icons/arrow-right-black.png"
                                    alt=""></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="{{route('portfolios')}}" class="btn btn-dark btn-lg btn-block text-uppercase" role="button"
           aria-pressed="true">see all portfolios</a>
        <br>
    </section>
    <!-- Gallery section end -->
@endsection
