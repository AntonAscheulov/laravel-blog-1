@extends('layout')

@section('content')
    <div class="sp-container">
        <div class="page-title">
            <h2>{{$exhibition->title}}</h2>
        </div>
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">{{date('d-m-Y', strtotime($exhibition->date_start))}}
                - {{date('d-m-Y', strtotime($exhibition->date_end))}}</h2>
            <br>
            <p class="lead">{{ $exhibition->description }}</p>
            <h2 class="featurette-heading gallery-item">Artist: <a href="{{route('artistSingle', $exhibition->artist->id)}}"> {{$exhibition->getArtistName()}}</a></h2>
        </div>
        <div class="col-md-5 order-md-1">
            <img src="{{asset('storage/'.$exhibition->image)}}" alt="">
        </div>
    </div>
        <br>
        <!-- Gallery slider section -->
        <section class="gallery-slider-section">
            <div class="sp-container">
                <h2 class="gallery-title">All Future Exhibitions</h2>
            </div>
            <div class="gallery-slider owl-carousel">
                @foreach($exhibitionsFuture as $item)
                <div class="gallery-item">
                    <a href="{{route('exhibitionSingle', $item->id)}}"><img
                                src="{{asset('storage/'.$item->image)}}" alt=""></a>
                    <h4><a
                            href="{{route('exhibitionSingle', $item->id)}}">{{$item->title}}</a></h4>
                    <p>Artist: <a href="{{route('artistSingle', $item->artist->id)}}">{{$item->getArtistName()}}</a><br>{{date('d-m-Y', strtotime($item->date_start))}}
                        - {{date('d-m-Y', strtotime($item->date_end))}}</p>
                </div>
                @endforeach
            </div>
        </section>
        <!-- Gallery slider section end -->
    </div>
@endsection
