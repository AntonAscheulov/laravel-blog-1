@extends('layout')

@section('content')
    <div class="container">
        <div class="leave-comment mr0"><!--leave comment-->
            @if(session('status'))
                <div class="alert alert-danger">{{session('status')}}</div>
            @endif
        </div>
        <h3 class="text-uppercase">Login</h3>
        <br>
        @include('admin.errors')
        <form role="form" method="post" action="{{route('login')}}">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                       placeholder="Enter email" value="{{old('email')}}">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
        </form>
        <br>
    </div>
@endsection
