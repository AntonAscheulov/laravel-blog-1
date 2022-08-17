@extends('layout')

@section('content')
    <section class="artists-page page-warp">
        <div class="sp-container">
            <div class="page-title">
                <h2>Exhibitions</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed
                    sagittis.</p>
            </div>
            <div class="row artists-row">
                @foreach($exhibitions as $exhibition)
                    <div class="col-lg-4 col-sm-6 artists-col">
                        <div class="artists-item">
                            <img src="{{asset('storage/'.$exhibition->image)}}" alt="">
                            <h4>{{$exhibition->title}}</h4>
                            <span>By {{$exhibition->getArtistName()}}</span>
                            <p>{{date('d-m-Y', strtotime($exhibition->date_start))}} - {{date('d-m-Y', strtotime($exhibition->date_end))}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <span class="pagination pagination-lg">{{$exhibitions->links()}}</span>
    </section>
    <!-- Artists page end -->
@endsection
