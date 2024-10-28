@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h2 class="card-title mb-0">Create a Post</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required placeholder="Enter post title">
                </div>

                <div class="form-group mb-4">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required placeholder="Write your post content here"></textarea>
                </div>

                <!-- Interest Selection -->
                <div class="form-group mb-4">
                    <label for="interest" class="form-label">Interest</label>
                    <select class="form-control" id="interest" name="interest_id" required>
                        @foreach ($interests as $interest)
                            <option value="{{ $interest->id }}" 
                                @if(isset($interest_id) && $interest_id == $interest->id) selected @endif>
                                {{ $interest->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">Submit Post</button>
            </form>
        </div>
    </div>
</div>
@endsection

