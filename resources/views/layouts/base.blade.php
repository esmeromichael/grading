<!DOCTYPE html>
<html>
    <head>
        <title>MTO ERP</title>

        <link rel="stylesheet" href="/css/app.css">

        <link href='http://fonts.googleapis.com/css?family=Roboto:300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        @yield('body')

    <!--Date-->
    <script language="javascript">
    var today = new Date();
    document.getElementById('date').innerHTML=today.toDateString();
    </script>

        <script src="/js/all.js"></script>

    </body>
</html>
