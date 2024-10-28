@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-center text-success mb-4">Select a Board</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($interests as $interest)
            <div class="col">
                <a href="{{ route('interests.show', $interest->id) }}" class="text-decoration-none">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success">{{ $interest->name }}</h5>
                            <p class="card-text text-muted">Explore and discuss topics related to {{ $interest->name }}.</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

