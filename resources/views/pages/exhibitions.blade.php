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
                        <div class="gallery-item">
                            <a href="{{route('exhibitionSingle', $exhibition->id)}}"><img
                                    src="{{asset('storage/'.$exhibition->image)}}" alt=""></a>
                            <h4><a
                                    href="{{route('exhibitionSingle', $exhibition->id)}}">{{$exhibition->title}}</a></h4>
                            <span>Artist: <a href="{{route('artistSingle', $exhibition->artist->id)}}">{{$exhibition->getArtistName()}}</a></span>
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
