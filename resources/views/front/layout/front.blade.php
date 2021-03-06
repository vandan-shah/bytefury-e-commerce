<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="/assets/img/mobile-logo.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&family=Parisienne&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link href="{{mix('/front/css/front.css')}}" rel="stylesheet" type="text/css">
    <style>
      .dropdown:hover .dropdown-menu {
        display: block;
      }

      .video {
        opacity: 0.8;
      }

    </style>
    
    <title>NeoCyber!</title>
</head>
<body>
  <div id="front">
    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')
      
  </div>
  
  <script type="text/javascript" src="{{mix('/front/js/front.js')}}"></script>
</body> 
</html>
