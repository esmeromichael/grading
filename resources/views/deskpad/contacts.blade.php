@extends('layouts.main2')

@section('content')

<nav id="top_navigation" class="text_nav">
    <div class="container">
        <ul id="text_nav_h" class="clearfix j_menu top_text_nav jMenu">
            <li><a href="/deskpad">Home</a></li>
            <li class="active"><a href="/deskpad/partners">Partners</a></li>
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
            <li class="active"><a href="/deskpad/partners/{{ $partnerid->id }}/contacts">Contacts</a></li>
        </ul>
    </div>
    <div class="container">
        <h5>[{{$partnerid->id}}] - {{$partnerid->name}}</h5>
    </div>
</nav>
@if(Session::has('message'))
<div class="alert alert-success">
{{Session::get('message')}}
</div>
@endif
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
        <?php
        $index=1;
        ?>
            @foreach ($partnerscontact as $contact)
                <tr>
                    <td> <a href="/deskpad/partners/{{$partnerid->id}}/contacts/{{$contact->id}}">{{ $index++ }}</a></td>
                    <td>{{ $contact->first_name}} {{ $contact->middle_name }} {{$contact->last_name}}</td>
                    <td>{{ $contact->home}} {{ $contact->street }} {{ $contact->barangay}} {{ $contact->city }} {{$contact->province}} {{$contact->country}}</td>
                    <td>{{ $contact->tel_areacode}} {{$contact->tel_lineno }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@include('deskpad.modalfunctions.createcontact')
@endsection
