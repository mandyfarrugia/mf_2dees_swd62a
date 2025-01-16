@extends('layouts.main')

@section('content')
    <a href="{{ route('items.index') }}">All items</a>
    <a href="{{ route('items.create') }}">Add item</a>
    <a href="{{ route('items.show', 1) }}">Show item</a>
@endsection