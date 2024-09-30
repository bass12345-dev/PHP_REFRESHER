<!DOCTYPE html>
<html lang="en">
    <header>
        <title>{{$title}}</title>
        <link rel="stylesheet" href="{{asset('style.css')}}">
    </header>
    <body>
        <div class="main">
            @yield('content')
        </div>
    </body>
</html>