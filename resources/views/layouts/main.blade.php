@extends('layouts.base')

@section('body_class')
    sidebar_hidden side_fixed full_width
@endsection

@section('body')
    <div id="wrapper_all">
        <nav id="side_fixed_nav">
            <ul id="text_nav_side_fixed">
                <li>
                    <a href="/deskpad" title="Deskpad"><span class="fa fa-group fa-3x"></span> Deskpad</a>
                </li>
                <li>
                    <a href="/operations" title="Operations"><span class="fa fa-cog fa-3x"></span> Operations</a>
                </li>
                <li>
                    <a href="javascript:void(0)" title="Accounting"><span class="fa fa-bar-chart fa-3x"></span> Accounting</a>
                </li>
                <li>
                    <a href="javascript:void(0)" title="HR"><span class="fa fa-desktop fa-3x"></span> HR</a>
                </li>
            </ul>
        </nav>

        <header id="top_header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-2">
                        <a href="#" class="logo_main" title="MTO Technotrends">
                            <img src="/images/logo_main.png" alt="MTO Technotrends">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-push-7 col-sm-3">
                        <div class="pull-right dropdown">
                        <b><span id="date" style="font-size:15px;"></span></b> || <i><span id="time" style="font-size:15px;"></span></i>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                            <a class="dropdown-toggle" href="#" class="user_info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"><span class="fa fa-caret-down"></span></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
            
        </header>

        <nav id="mobile_navigation"></nav>

        <section class="container main_section">
            @yield('content')
        </section>
    </div>
@endsection
