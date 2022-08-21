<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sing Up Notification</title>
    <link rel="stylesheet" href="/css/front.css">
</head>
<body>
<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <h2>Hey {{$admin->name}}!</h2>
            <br>
            <p>New User is join us!</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item font-weight-bolder"> User name:</li>
            <li class="list-group-item"> {{$user->name}}</li>
            <li class="list-group-item font-weight-bolder" >User email:</li>
            <li class="list-group-item">{{$user->email}}</li>
        </ul>
    </div>
</div>
<script src="/js/front.js"></script>
</body>
</html>

