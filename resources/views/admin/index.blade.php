@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="row justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h1 class="display-5 text-primary mb-3">Welcome Back, {{ Auth::user()->name }}!</h1>
                        <p class="lead text-muted">We’re glad to see you again. Hope you have a productive day ahead.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
