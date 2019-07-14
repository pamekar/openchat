<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="username" content="{{\Illuminate\Support\Facades\Cookie::get('username')}}" id="username">
    <meta name="user_id" content="{{\Illuminate\Support\Facades\Cookie::get('user_id')}}" id="user_id">

    <title>{{\Illuminate\Support\Facades\Cookie::get('username')." - ".config('app.name')}}</title>
    <link href="{{asset('css/font-awesome.css')}}" type="text/css" rel="stylesheet">
    <link href="{{mix('css/app.css')}}" rel="stylesheet" id="bootstrap-css">
</head>
<body>
<div id="app">
    <chat></chat>
</div>
</body>
<script src="{{mix('js/app.js')}}"></script>
</html>