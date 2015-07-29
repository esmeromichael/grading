@extends('layouts.main')

@section('content')


        <nav id="top_navigation" class="text_nav">
            <div class="container">
                <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">

                    <li><a href="/partners/{{ $partnerinfo->id }}/profile">Profile</a></li>
                    <li><a href="/partners/{{ $partnerinfo->id }}/branches">Branches</a></li>
                    <li><a href="/partners/{{ $partnerinfo->id }}/contacts">Contacts</a></li>
                </ul>
            </div>
            <div class="container"> 
                   <h5>[{{$partnerinfo->id}}] - {{$partnerinfo->name}}</h5> 
            </div>
        
        </nav>

    <h6> Update Partner Info </h6>


  
@endsection
