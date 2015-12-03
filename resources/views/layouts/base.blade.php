<!DOCTYPE html>
<html>
    <head>
        <title>MTO ERP</title>

        <link rel="stylesheet" href="/css/app.css">
        <link href="{{ asset('/additional/css/fontfamily.css') }}" rel="stylesheet" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('/additional/css/select2.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/additional/css/simplepagination.css') }}" rel="stylesheet" />
        <link href="{{ asset('/additional/css/jquery-ui.css') }}" rel="stylesheet" />
        <link href="{{ asset('/additional/css/additional.css') }}" rel="stylesheet" />
        <!--Time-->
    <script language="javascript">
    function startTime() {
    var today=new Date();
    var h=today.getHours();
    var m=today.getMinutes();
    var s=today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('time').innerHTML = h+":"+m+":"+s;
    var t = setTimeout(function(){startTime()},500);
    }

    function checkTime(i) {
    if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
    }
    </script>

    </head>

    <body class="@yield('body_class')" onload="startTime()">
    <script src="{{ asset('/additional/js/jquery.min.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <script src="/js/all.js"></script>
    <script src="{{ asset('/additional/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('/additional/js/select2.min.js') }}"></script>
    <script src="{{ asset('/additional/js/simplePagination.js') }}"></script>
    <script src="{{ asset('/additional/js/jquery-ui.js') }}"></script>
    @yield('body')
    <!--Date-->
    <script language="javascript">
    var today = new Date();
    document.getElementById('date').innerHTML=today.toDateString();
    </script>
    </body>
</html>
