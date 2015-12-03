@extends('layouts.base')

@section('body_class')
    sidebar_hidden side_fixed full_width
@endsection

@section('body')
    <div id="wrapper_all">
        <nav id="side_fixed_nav">
           <ul id="text_nav_side_fixed">
               <li>
                    <a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myModalSubject"><span class="fa fa-group fa-3x"></span> Deskpad</a>

                </li>
                <li>
                    <a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myModalsubsubject"><span class="fa fa-cog fa-3x"></span> Operations</a>
                </li>
                <li>
                    <a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myModalSetSubject"><span class="fa fa-bar-chart fa-3x"></span> Accounting</a>
                </li>
                <li>
                    <a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myModal1"><span class="fa fa-desktop fa-3x"></span> HR</a>
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
                        <b><span id="date" style="font-size:15px;"></span></b> || <i><span id="time" style="font-size:15px;"></span></i>
                           &nbsp;&nbsp;&nbsp;
                           <a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-file"></i></a>
                           &nbsp;&nbsp;&nbsp;
                           <a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i></a>
                           &nbsp;&nbsp;&nbsp;
                           <a class="dropdown-toggle" href="#" class="user_info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"> <span class="fa fa-caret-down"></span></i></a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-user fa-fw"></i>Change Your Account</a>
                            </li>
                            <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
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

@include('deskpad.modalfunctions.createpartner')
@include('deskpad.modalfunctions.createcontact')
@include('deskpad.modalfunctions.createSetSubject')
@include('deskpad.modalfunctions.createbranch')
@endsection
