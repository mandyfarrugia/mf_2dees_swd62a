<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <div>
            <a href="{{ route('items.index') }}">All items</a>
            <a href="{{ route('items.create') }}">Add item</a>
            <a href="{{ route('items.show', 1) }}">Show item</a>
        </div>
    </body>
</html>
