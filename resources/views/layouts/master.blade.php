<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FYPMS</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
@include('layouts.header')
<div class="body-container">    
    @include('side-bars.sidebar')
    <div class="body-element-container">
        @yield('counter')

        <div class="content-container">
            
            @yield('content')

        </div>
        
        @include('layouts.footer')
    </div>
</div>

<script src="{{asset('assets/js/script.js')}}"></script>
</body>
</html>