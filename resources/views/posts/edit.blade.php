@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
        </div>

        <!-- Content Field -->
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
        </div>

        <!-- Interest Dropdown -->
        <div class="form-group mb-3">
            <label for="interest">Interest</label>
            <select class="form-control" id="interest" name="interest_id" required>
                @foreach ($interests as $interest)
                    <option value="{{ $interest->id }}" 
                        @if(old('interest_id', $post->interest_id) == $interest->id) selected @endif>
                        {{ $interest->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Post</button>

        <!-- Back Button -->
        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

