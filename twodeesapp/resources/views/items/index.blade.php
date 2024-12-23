@extends('layouts.main')

@section('content')
    <h1>All items</h1>
    <a href="{{ route('items.create') }}">Add item</a> |
    <a href="{{ route('items.show', 1) }}">Show item</a>
@endsection