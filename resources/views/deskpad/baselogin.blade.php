@extends('layouts.base')



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
                            <img src="/images/grade_main.png" alt="MTO Technotrends" style="width:50px; height:50px;">
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-push-7 col-sm-3">
                        <div class="pull-right dropdown">
                        <b><span id="date" style="font-size:15px; color:#99FF66"></span></b> || <i><span id="time" style="font-size:15px; color:#99FF66"></span></i>
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <!-- <a class="dropdown-toggle" href="#" class="user_info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"><span class="fa fa-caret-down"></span></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Log Out</a></li>
                            </ul> -->
                        </div>
                    </div>

                </div>
                <form class="navbar-form navbar-right" role="search" method="POST" action="{{ action('Deskpad\PartnerController@login') }}">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-default">Log In</button>
                    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                    </div>
                </form>
            </div>

        </header>
        <nav id="mobile_navigation"></nav>
        <section class="container main_section">
            @yield('content')
        </section>
 <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >


                     <div class="panel-heading">
                            <div class="panel-title"><b>Register Here<b></div>

                        </div>
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                <div id="signupalert" style="display:none" class="alert alert-danger">

                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-primary"><i class="icon-facebook"></i> &nbsp Sign Up</button>

                                    </div>
                                </div>


                            </form>
                         </div>
                    </div>
        </div>
@endsection
