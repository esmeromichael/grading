@extends('layouts.main')

@section('content')
        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">

                    <li><a href="/deskpad">Home</a></li>
                    <li><a href="/deskpad/partners">Partners</a></li>

                </ul>
            </div>
        </nav>

        <section class="container main_section">

        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
                    <li><a href="/deskpad/partners/{{ $partnerinfo->partner_id }}/profile">Profile</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerinfo->partner_id }}/branches">Branches</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerinfo->partner_id }}/contacts">Contacts</a></li>
                </ul>
            </div>
            <div class="container"> 
                   <h5>[{{$partnerinfo->partner_id}}] - {{$partnerinfo->name}}</h5> 
            </div>
        
        </nav>

    <h6> Update Partner Info </h6>


  
@endsection
