@extends('layout')

@section('content')
        <div class="container">
            <div class="page-title">
                <h2>My profile</h2>
            </div>
            @include('admin.errors')
            <div class="artists-item">
            <img src="{{asset('storage/'.$user->avatar)}}" alt=" ">
            </div>
            <form role="form" method="post" action="{{route('profileUpdate')}}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                           value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                           placeholder="Enter email" value="{{$user->email}}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">About myself</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="avatar">
                    <label class="custom-file-label" for="customFile">Change avatar</label>
                </div>
                <hr class="">
                <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>
            </form>
            <br>
        </div>
@endsection
