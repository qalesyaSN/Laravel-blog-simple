@extends('layouts.app')
@section('title', 'Add Post')
@section('content')
<div class="container">
    <!--x-alert /-->
    <div class="card">
        <div class="card-header">Add Post</div>
        <div class="card-body">
    <form action="{{ route('admin.pages.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="setting_key">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $post->title }}">
            @error('title')
            <div class="alert alert-danger mt-2 p-2">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control @error('title') is-invalid @enderror" name="content">{{ $post->content }}</textarea>
            @error('content')
            <div class="alert alert-danger mt-2 p-2">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="setting_key">Thumbnail</label>
            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
            @error('thumbnail')
            <div class="alert alert-danger mt-2 p-2">
            {{ $message }}
            </div>
            @enderror
            <div class="col-6 card card-body mt-2">
                <img src="/storage/{{ $post->thumbnail }}" width="100%">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="setting_key">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option>Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="alert alert-danger mt-2 p-2">
            {{ $message }}
            </div>
            @enderror
        </div>

         
        <button type="submit" class="btn btn-secondary" name="status" value="Draft">Draft</button>
        <button type="submit" class="btn btn-primary" name="status" value="Published">Publish</button>
    </form>
    </div>
    </div>
</div>
@endsection