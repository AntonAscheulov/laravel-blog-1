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
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group-lg" role="group" aria-label="First group">
                @foreach($post->tags as $tag)
                    <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-secondary" role="button"
                       aria-pressed="true">{{$tag->title}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('storage/'.$post->image)}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/'.$post->image)}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('storage/'.$post->image)}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    @if(\Illuminate\Support\Facades\Auth::check())
    <div class="sp-container">
        <h2 class="featurette-heading">Leave a comment</h2>
        <br>
        <form role="form" method="post" action="#">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" d="subject" name="subject"
                       placeholder="Website url">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="message"
                          placeholder="Write Massage" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-dark btn-lg btn-block">Post comment</button>
        </form>
    </div>
    @endif


                    <div class="bottom-comment"><!--bottom comment-->
                        <h4>3 comments</h4>

                        <div class="comment-img">
                            <img class="img-circle" src="/images/comment-img.jpg" alt="">
                        </div>

                        <div class="comment-text">
                            <a href="#" class="replay btn pull-right"> Replay</a>
                            <h5>Rubel Miah</h5>

                            <p class="comment-date">
                                December, 02, 2015 at 5:57 PM
                            </p>


                            <p class="para">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed
                                diam nonumy
                                eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                voluptua. At vero eos et cusam et justo duo dolores et ea rebum.</p>
                        </div>
                    </div>
                    <!-- end bottom comment-->


                    <div class="leave-comment"><!--leave comment-->
                        <h4>Leave a reply</h4>


                        <form class="form-horizontal contact-form" role="form" method="post" action="#">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="subject" name="subject"
                                           placeholder="Website url">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
										<textarea class="form-control" rows="6" name="message"
                                                  placeholder="Write Massage"></textarea>
                                </div>
                            </div>
                            <a href="#" class="btn send-btn">Post Comment</a>
                        </form>
                    </div><!--end leave comment-->
                </div>
            </div>
        </div>
    </div>
@endsection
