@extends('layouts.app')

@section('content')

@VITE('resources/css/style.css')
<div class="post-container">
    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="error-box">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="/posts">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input 
                type="text" 
                id="title" 
                name="title" 
                placeholder="Enter title"
                value="{{ old('title') }}"
            >
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea 
                id="content" 
                name="content" 
                placeholder="Enter content"
            >{{ old('content') }}</textarea>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea 
                id="description" 
                name="description" 
                placeholder="Enter description"
            >{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn-save">Save Post</button>
    </form>
</div>

@endsection