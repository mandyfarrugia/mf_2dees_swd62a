@extends('layouts.main')
@section('content')
    <main class="py-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12">
                    <div id="game-controller-emoji">
                        <span>🎮</span>
                    </div>
                    <h1 id="error-404">404 - Page Not Found</h1>
                    <h2 id="error-404">You’ve wandered off the map... and there’s no fast travel available.</h2>
                    <p id="error-404">Looks like this URL is more hidden than an easter egg in <strong>Dark Souls</strong>.
                        Try heading back to
                        safer territory — or press <strong>F</strong> to pay respects.</p>
                    <a class="btn btn-primary" href="{{ url('/') }}">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span>Return to base</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection