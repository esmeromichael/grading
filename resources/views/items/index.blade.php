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
                    <td> <a href="/partners/{{ $item->id }}">{{ $item->id }}</a></td>
                    <td>{{ $item->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
