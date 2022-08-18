@extends('layout')

@section('content')
<!-- Gallery page -->
<section class="gallery-page page-warp">
    <div class="sp-container">
        <div class="row m-0">
            <div class="col-lg-6 p-0">
                <div class="gallery-left-col">
                    <h2 class="big-title">About The Gallery</h2>
                    <div class="gallery-item">
                        <a href="{{route('exhibitionSingle', $exhibitionNow->id)}}"><img
                                src="{{asset('storage/'.$exhibitionNow->image)}}" alt=""></a>
                        <h4>Now @ The Look</h4>
                        <p>Artist: <a href="{{route('artistSingle', $exhibitionNow->artist->id)}}">{{$exhibitionNow->getArtistName()}}</a></p>
                        <a href="{{route('exhibitionSingle', $exhibitionNow->id)}}" class="site-btn">view gallery <img src="img/icons/arrow-right-black.png" alt=""></a>
                    </div>
                    <div class="info-numbers">
                        <h2 class="gallery-title">Numbers</h2>
                        <div class="in-item">
                            <h2>130<span>+</span></h2>
                            <h4>Photography Exibitions</h4>
                        </div>
                        <div class="in-item">
                            <h2>150 000<span>+</span></h2>
                            <h4>Visitors</h4>
                        </div>
                        <div class="in-item">
                            <h2>1395</h2>
                            <h4>Days</h4>
                        </div>
                        <div class="in-item">
                            <h2>86<span>+</span></h2>
                            <h4>Artists</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="gallery-right-col">
                    <div class="gallery-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed sagittis, turpis a imperdiet eleifend, est ligula convallis augue, sit amet porta urna justo vel neque. Pellentesque a interdum nunc. Nunc congue eget nisl et laoreet. Vivamus suscipit vulputate enim a pellentesque. Vivamus id mattis orci. Donec ut dignissim dolor. Maecenas tortor ex, fauci-bus ac mauris a, pellentesque tincidunt turpis. </p>
                        <p>Phasellus eget nibh nec nibh porta semper a nec turpis. Interdum et malesua-da fames ac ante ipsum primis in faucibus. Maecenas rhoncus metus eu enim posuere, tincidunt porta ex interdum. Nam id lectus dui. Cras feugiat purus condimentum, condimentum urna imperdiet, vehicula nisi.</p>
                        <h2>Our Vision</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed sagittis, turpis a imperdiet eleifend, est ligula convallis augue, sit amet porta urna justo vel neque. Pellentesque a interdum nunc.</p>
                        <div class="gallery-quite">
                            <h2>“It is good to love many things, for therein lies the true strength, and who-soever loves much performs much, and can accomplish much, and what is done in love is well done.”</h2>
                            <h3>Vincent Van Gogh</h3>
                        </div>
                    </div>
                    <h2 class="gallery-title">Soon @ The Look</h2>
                    <div class="gallery-item">
                        <a href="{{route('exhibitionSingle', $exhibitionFuture->id)}}"><img
                                src="{{asset('storage/'.$exhibitionFuture->image)}}" alt=""></a>
                        <h4><a
                                href="{{route('exhibitionSingle', $exhibitionFuture->id)}}">{{$exhibitionFuture->title}}</a></h4>
                        <p>Artist: <a href="{{route('artistSingle', $exhibitionFuture->artist->id)}}">{{$exhibitionFuture->getArtistName()}}</a><br>{{date('d-m-Y', strtotime($exhibitionFuture->date_start))}}
                            - {{date('d-m-Y', strtotime($exhibitionFuture->date_end))}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery page end -->

<!-- Gallery slider section -->
<section class="gallery-slider-section">
    <div class="sp-container">
        <h2 class="gallery-title">All Past Exhibitions</h2>
    </div>
    <div class="gallery-slider owl-carousel">
        @foreach($exhibitionsPast as $item)
            <div class="gallery-item">
                <a href="{{route('exhibitionSingle', $item->id)}}"><img
                        src="{{asset('storage/'.$item->image)}}" class="img-fluid" alt=""></a>
                <h4><a
                        href="{{route('exhibitionSingle', $item->id)}}">{{$item->title}}</a></h4>
                <p>Artist: <a href="{{route('artistSingle', $item->artist->id)}}">{{$item->getArtistName()}}</a><br>{{date('d-m-Y', strtotime($item->date_start))}}
                    - {{date('d-m-Y', strtotime($item->date_end))}}</p>
            </div>
        @endforeach
    </div>
</section>
<!-- Gallery slider section end -->
@endsection
