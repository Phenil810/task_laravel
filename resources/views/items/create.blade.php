@extends('layouts.app')

@section('content')
    <h1>Add New Item</h1>

    <form action="{{ route('items.store') }}" method="post">
        @csrf
        <label for="name">Item Name:</label>
        <input type="text" name="name" required>
        <button type="submit">Add Item</button>
    </form>
@endsection