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
                    <li><a href="/deskpad/partners/{{ $partnerid->partner_id }}/profile">Profile</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerid->partner_id }}/branches">Branches</a></li>
                    <li><a href="/deskpad/partners/{{ $partnerid->partner_id }}/contacts">Contacts</a></li>
                </ul>          
            </div>
            <div class="container"> 
                   <h5>[{{$partnerid->partner_id}}] - {{$partnerid->name}}</h5> 
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
                    <td> <a href="#">{{ $contact->contact_id }}</a></td>
                    <td>{{ $contact->full_name }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->tel_areacode}} {{$contact->tel_lineno }}</td>                  
                </tr>
            @endforeach
        </tbody>
    </table>


  
@endsection
