@extends('layouts.base')

@section('body_class')
    sidebar_hidden side_fixed full_width
@endsection

@section('body')
    <div id="wrapper_all">
        <nav id="side_fixed_nav">
            <ul id="text_nav_side_fixed">
                <li>
                    <a href="javascript:void(0)" title="Operations"><span class="fa fa-cubes"></span> Operations</a>
                </li>
                <li>
                    <a href="javascript:void(0)" title="Accounting"><span class="fa fa-bar-chart"></span> Accounting</a>
                </li>
                <li>
                    <a href="javascript:void(0)" title="HR"><span class="fa fa-group"></span> HR</a>
                </li>
            </ul>
        </nav>

        <header id="top_header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-sm-2">
                        <a href="/" class="logo_main" title="MTO Technotrends">
                            <img src="/images/logo_main.png" alt="MTO Technotrends">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-push-7 col-sm-3">
                        <div class="pull-right dropdown">
                            <a href="#" class="user_info dropdown-toggle" data-toggle="dropdown">
                                Username
                                <span class="caret"></span>
                            </a>
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

        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">

                    <li><a href="/partners">Partners</a></li>

                </ul>
            </div>
        </nav>

        <section class="container main_section">
            @yield('content')
        </section>
    </div>
@endsection
