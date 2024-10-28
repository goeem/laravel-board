@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h1 class="card-title">{{ $post->title }}</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <p class="text-muted"><strong>Posted by:</strong> {{ $post->user->name }}</p>
                <p class="text-muted"><strong>Interest:</strong> <a href="{{ route('interests.show', $post->interest->id) }}" class="text-success">{{ $post->interest->name }}</a></p>
                <p class="text-muted"><strong>Created on:</strong> {{ $post->created_at->format('F d, Y') }}</p>
            </div>

            <div class="mb-4">
                <h4>Content:</h4>
                <p class="fs-5">{{ $post->content }}</p>
            </div>

            <!-- Buttons Section -->
            <div class="d-flex">
                <!-- Back button -->
                <a href="{{ route('interests.show', $post->interest->id) }}" class="btn btn-outline-secondary me-2">
                    Back to {{ $post->interest->name }} Posts
                </a>

                @if (auth()->id() === $post->user_id)
                    <!-- Edit Button -->
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary me-2">
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            Delete
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

