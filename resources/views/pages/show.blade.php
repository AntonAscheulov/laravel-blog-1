@extends('layout')

@section('content')
    <div class="sp-container">
        <div class="page-title">
            <h2>{{$post->title}}</h2>
        </div>

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">By {{$post->getArtistName()}}</h2>
                <br>
                <p class="lead">{{ $post->content }}</p>
                @if($post->category)
                    <a href="{{route('category.show', $post->category->slug)}}" class="btn btn-lg btn-secondary"
                       role="button" aria-pressed="true">{{$post->getCategoryTitle()}}</a>
                @else
                    <span class="text-muted">{{$post->getCategoryTitle()}}</span>
                @endif
            </div>
            <div class="col-md-5 order-md-1">
                <img src="{{asset('storage/'.$post->image)}}" alt="">
            </div>
        </div>
        <br>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group-lg" role="group" aria-label="First group">
                @foreach($post->tags as $tag)
                    <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-secondary" role="button"
                       aria-pressed="true">{{$tag->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <section class="gallery-slider-section pt-lg-5">
        <div class="gallery-slider owl-carousel">
            @foreach($photos as $photo)
                <div class="gallery-item">
                    <a href="{{asset('storage/'.$photo->photo)}}"><img
                            src="{{asset('storage/'.$photo->photo)}}" class="img-exhib" alt=""></a>
                </div>
            @endforeach
        </div>
    </section>
    @if (!$post->comments->isEmpty())
        <h2 class="featurette-heading ml-4 py-2">Comments</h2>
        @foreach($post->getComments() as $comment)
    <div class="sp-container mt-2 py-2">
        <div class="media">
            <img src="{{asset('storage/'.$comment->author->avatar)}}" class="rounded-circle align-self-start mr-3" alt="..." width="75" height="75">
            <div class="media-body">
                <h3 class="mt-0">{{$comment->author->name}}</h3>
                <p class="comment-date">
                    {{$comment->created_at->diffForHumans()}}
                </p>
                <p class="para">{{$comment->text}}</p>
            </div>
        </div>
    </div>
        @endforeach
    @endif
    @if(\Illuminate\Support\Facades\Auth::check())
        <div class="sp-container">
            <h2 class="featurette-heading">Leave a comment</h2>
            @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            <br>
            <form role="form" method="post" action="{{route('comment')}}" class="pb-5">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                <textarea class="form-control" name="comment"
                          placeholder="Write Comment" rows="6"></textarea>
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block">Commit</button>
            </form>
        </div>
    @endif
@endsection
