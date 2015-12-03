@extends('layouts.main')

@section('content')
<nav id="top_navigation" class="text_nav">
    <div class="container">
        <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
            <li><a href="/deskpad">Home</a></li>
            <li class="active"><a href="/deskpad/partners">Student</a></li>
            <li><a href="/deskpad/grade">Grade</a></li>
        </ul>
    </div>
</nav>
<section class="container main_section">

<h5>This is the Sutdents Tab. [{{$profile->name}}] </h5>
<script type="text/javascript">
</script>
@endsection
