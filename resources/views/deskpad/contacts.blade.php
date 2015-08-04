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

                </ul>
            </div>
            <div class="container"> 
                    <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/profile">Profile</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/branches">Branches</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerid->id }}/contacts">Contacts</a></li>
                </ul>          
            </div>
            <div class="container"> 
                   <h5>[{{$partnerid->id}}] - {{$partnerid->name}}</h5> 
            </div>
        </nav>

    <h6>This is the Contacts Tab. Click on the Contact ID to view details</h6>


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Contact ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Contacts</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($partnerscontact as $contact)
                <tr>
                    <td> <a href="/deskpad/partners/{{$partnerid->id}}/contacts/{{$contact->id}}">{{ $contact->id }}</a></td>
                    <td>{{ $contact->first_name}} {{ $contact->middle_name }}{{$contact->last_name}}</td>
                    <td>{{ $contact->home}}, {{ $contact->street }}, {{ $contact->barangay}}, {{ $contact->city }}, {{$contact->province}}, {{$contact->country}}</td>
                    <td>{{ $contact->tel_areacode}} {{$contact->tel_lineno }}</td>                  
                </tr>
            @endforeach
        </tbody>
    </table>


  
@endsection
