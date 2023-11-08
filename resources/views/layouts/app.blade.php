<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page @yield("title")</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/font-awesome/css/all.css')}}">
</head>
<body>
    <header> 
        @include ('includes.header')
    </header>
    <div class="container-fluid">
        @yield("content")
    </div>
    <!-- <footer>
        
    </footer> -->
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
</body>
</html>