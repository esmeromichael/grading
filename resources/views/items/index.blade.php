@extends('layouts.main')

@section('content')
    <h1>ITEMS LIST</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
