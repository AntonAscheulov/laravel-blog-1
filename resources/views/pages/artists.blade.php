@extends('layout')

@section('content')
    <section class="artists-page page-warp">
        <div class="sp-container">
            <div class="page-title">
                <h2>Artists</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed
                    sagittis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed
                    sagittis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed
                    sagittis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis et augue non mollis. Sed
                    sagittis.</p>
            </div>
            <div class="row artists-row">
                @foreach($artists as $artist)
                    <div class="col-lg-4 col-sm-6 artists-col">
                        <div class="gallery-item">
                            <a href="{{route('artistSingle', $artist->id)}}"><img
                                    src="{{asset('storage/'.$artist->artist_avatar)}}" alt=""></a>
                            <h4><a href="{{route('artistSingle', $artist->id)}}">{{$artist->artist_name}}</a>
                            </h4>
                            <span>{{$artist->artist_profession}}</span>
                            <p>{{$artist->artist_short_description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <span class="pagination pagination-lg">{{$artists->links()}}</span>
    </section>
    <!-- Artists page end -->
@endsection
