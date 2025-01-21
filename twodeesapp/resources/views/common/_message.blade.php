@if($message = session('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@elseif($message = session('error'))
    <div class="alert alert-danger">
        {{ $message }}
    </div>
@endif