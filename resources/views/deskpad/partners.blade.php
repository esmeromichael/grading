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
    <h5>This is the Partners Tab. Click on the Partner ID to view details</h5>


    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Partner ID</th>
                <th>Partner Name</th>
                <th>Type</th>
                <th>Address</th>
                <th>Contact No.</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($partners as $partner)
                <tr>
                    <td> <a href="/deskpad/partners/{{ $partner->partner_id }}/profile">{{ $partner->partner_id }}</a></td>
                    <td>{{ $partner->name }}</td>
                    <td> # </td>
                    <td>{{ $partner->address }}</td>
                    <td>{{ $partner->tel_areacode}} {{$partner->tel_lineno }}</td>
                    <td>{{ $partner->status }} </td>                   
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection