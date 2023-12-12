@extends('layouts.app')

@section('content')
    <h1>Items List</h1>

    <ul>
        @foreach($items as $item)
            <li>{{ $item->name }}</li>
        @endforeach
    </ul>
@endsection