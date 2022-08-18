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
                <a href="{{route('category.show', $post->category->slug)}}" class="btn btn-lg btn-secondary" role="button" aria-pressed="true">{{$post->getCategoryTitle()}}</a>
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
                    <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-secondary" role="button" aria-pressed="true">{{$tag->title}}</a>
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







    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <article class="post">
                        <div class="post-thumb">
                            <a href="{{route('post.show', $post->slug)}}"><img src="{{asset('storage/'.$post->image)}}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                @if($post->category)
                                    <h6><a href="{{route('category.show', $post->category->slug)}}"> {{$post->getCategoryTitle()}}</a></h6>
                                @else
                                    <h6 class="text-info">{{$post->getCategoryTitle()}}</h6>
                                @endif
                                <h1 class="entry-title"><a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a></h1>
                            </header>
                            <div class="entry-content">
                              {!! $post->content !!}
                            </div>
                            <div class="decoration">
                                @foreach($post->tags as $tag)
                                <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">{{$tag->title}}</a>
                                @endforeach
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize">By <a href="#">Rubel</a></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>
                    <div class="top-comment"><!--top comment-->
                        <img src="/images/comment.jpg" class="pull-left img-circle" alt="">
                        <h4>Rubel Miah</h4>

                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                            invidunt ut labore et dolore magna aliquyam erat.</p>
                    </div><!--top comment end-->
                    <div class="row"><!--blog next previous-->
                        <div class="col-md-6">
                            @if($post->hasPrevious())
                            <div class="single-blog-box">
                                <a href="{{route('post.show', $post->getPostPrevious()->slug)}}">
                                    <img src="{{asset('storage/'.$post->getPostPrevious()->image)}}" alt="">

                                    <div class="overlay">

                                        <div class="promo-text">
                                            <p><i class=" pull-left fa fa-angle-left"></i></p>
                                            <h5>{{$post->getPostPrevious()->title}}</h5>
                                        </div>
                                    </div>

                                </a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            @if($post->hasNext())
                            <div class="single-blog-box">
                                <a href="{{route('post.show', $post->getPostNext()->slug)}}">
                                    <img src="{{asset('storage/'.$post->getPostNext()->image)}}" alt="">

                                    <div class="overlay">
                                        <div class="promo-text">
                                            <p><i class=" pull-right fa fa-angle-right"></i></p>
                                            <h5>{{$post->getPostNext()->title}}</h5>

                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div><!--blog next previous end-->
                    <div class="related-post-carousel"><!--related post carousel-->
                        <div class="related-heading">
                            <h4>You might also like</h4>
                        </div>
                        <div class="items">
                            @foreach($post->related() as $item)
                            <div class="single-item">
                                <a href="{{route('post.show', $item->slug)}}">
                                    <img src="{{asset('storage/'.$item->image)}}" alt="">
                                    <p>{{$item->title}}</p>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div><!--related post carousel-->
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
