@extends('layouts.main')

@section('content')

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
                    <td> <a href="/partners/{{ $partner->partner_id }}/profile">{{ $partner->partner_id }}</a></td>
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
