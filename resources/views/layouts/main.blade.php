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
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu l_tinynav1">
                <li class="jmenu-level-0">
                    <a href="javascript:void(0)" class="fNiv isParent isTopParent">Dashboard<i class="icon-angle-down"></i></a>
                    <ul style="top: 31px; left: 0px; width: 200px; display: none;">
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="dashboard_drag_drop.html">Drag &amp; Drop Dashboard</a></li>
                        <li>
                            <a href="javascript:void(0)" class="isParent">Navigations<i class="icon-angle-right"></i></a>
                            <ul style="top: 0px; left: 200px; width: 200px;">
                                <li><a href="nav_side_accordion.html">Accordion Navigation</a></li>
                                <li class="link_active"><a href="nav_side_icons.html">Icon Navigation</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="jmenu-level-0">
                    <a href="javascript:void(0)" class="fNiv isParent isTopParent">Forms<i class="icon-angle-down"></i></a>
                    <ul style="top: 31px; left: 0px; width: 200px; display: none;">
                        <li><a href="form_regular_elements.html">Regular elements</a></li>
                        <li><a href="form_extended_elements.html">Extended elements</a></li>
                        <li><a href="form_multiupload.html">Multiupload</a></li>
                        <li><a href="form_validation.html">Form validation</a></li>
                        <li><a href="wizard.html">Wizard</a></li>
                        <li><a href="wysiwg.html">WYSIWG Editor</a></li>
                    </ul>
                </li>
                <li class="jmenu-level-0">
                    <a href="javascript:void(0)" class="fNiv isParent isTopParent">Components<i class="icon-angle-down"></i></a>
                    <ul style="top: 31px; left: 0px; width: 200px;">
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="charts.html">Charts</a></li>
                        <li><a href="contact_list.html">Contact List</a></li>
                        <li><a href="editable_elements.html">Editable Elements</a></li>
                        <li><a href="file_manager.html">File manager</a></li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="gmaps.html">Google Maps</a></li>
                        <li>
                            <a href="javascript:void(0)" class="isParent">Tables<i class="icon-angle-right"></i></a>
                            <ul style="top: 0px; left: 200px; width: 200px;">
                                <li><a href="datatables.html">Datatables</a></li>
                                <li><a href="regular_tables.html">Regular</a></li>
                                <li><a href="slick_grid.html">Slick Grid</a></li>
                                <li><a href="table_responsive.html">Responsive Table</a></li>
                            </ul>
                        </li>
                        <li><a href="tree_plugin.html">Tree Plugin</a></li>
                    </ul>
                </li>
                <li class="jmenu-level-0">
                    <a href="javascript:void(0)" class="fNiv isParent isTopParent">UI Elements<i class="icon-angle-down"></i></a>
                    <ul style="top: 31px; left: 0px; width: 200px;">
                        <li><a href="alerts_buttons.html">Alerts, Buttons</a></li>
                        <li><a href="grid.html">Grid</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="notifications.html">Notifications</a></li>
                        <li><a href="panels.html">Panels</a></li>
                        <li><a href="tabs_accordions.html">Tabs, Accordions</a></li>
                        <li><a href="tooltips_popovers.html">Tooltips, Popovers</a></li>
                        <li><a href="typography.html">Typography</a></li>
                    </ul>
                </li>
                <li class="jmenu-level-0">
                    <a href="javascript:void(0)" class="fNiv isParent isTopParent">Other Pages<i class="icon-angle-down"></i></a>
                    <ul style="top: 31px; left: 0px; width: 200px;">
                        <li><a href="blank.html">Blank page</a></li>
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="contact_page.html">Contact Page</a></li>
                        <li><a href="error_404.html">Error 404</a></li>
                        <li><a href="help_faq.html">Help/Faq</a></li>
                        <li><a href="invoices.html">Invoices</a></li>
                        <li><a href="landing_page.html">Landing Page</a></li>
                        <li><a href="login_page.html">Login Page</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li><a href="pricing_table.html">Pricing Table</a></li>
                        <li><a href="search_page.html">Search Page</a></li>
                        <li><a href="settings.html">Site Settings</a></li>
                        <li><a href="user_profile.html">User profile</a></li>
                    </ul>
                </li>                   </ul>
            </div>
        </nav>

        <section class="container main_section">
            @yield('content')
        </section>
    </div>
@endsection
