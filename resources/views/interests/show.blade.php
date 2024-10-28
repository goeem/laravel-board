@extends('layouts.app')

@section('content')
<div class="container my-5">
    <!-- Board Header -->
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">{{ $interest->name }}</h1>
            <p class="text-center text-muted">Discuss and post about {{ $interest->name }}</p>
        </div>
    </div>

    <!-- Create Post Button -->
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <a href="{{ route('posts.create', ['interest_id' => $interest->id]) }}" class="btn btn-success btn-lg">
                New Thread in {{ $interest->name }}
            </a>
        </div>
    </div>

    <!-- Threads List -->
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-3">Threads in {{ $interest->name }}</h3>
            @if($interest->posts->count() > 0)
                <div class="list-group">
                    @foreach($interest->posts as $post)
                        <div class="list-group-item border rounded shadow-sm mb-3 p-4" style="background-color: #f8f9fa;">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5><a href="{{ route('posts.show', $post->id) }}" class="text-dark">{{ $post->title }}</a></h5>
                                    <small class="text-muted">Posted by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small>
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted text-center">No threads available in this board yet.</p>
            @endif
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <a href="{{ route('interests.index') }}" class="btn btn-secondary">
                Back to Boards
            </a>
        </div>
    </div>
</div>
@endsection

