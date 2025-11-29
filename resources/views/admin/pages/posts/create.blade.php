@extends('layouts.app')
@section('title', 'Add Post')
@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link href="{{ asset('assets/css/summernote.css') }}"  rel="stylesheet">
<div class="container">
    <!--x-alert /-->
    <div class="card">
        <div class="card-header">Add Post</div>
        <div class="card-body">
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="setting_key">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ old('title') }}">
            @error('title')
            <div class="alert alert-danger mt-2 p-2">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea id="summernote" class="form-control @error('title') is-invalid @enderror" name="content">{{ old('content') }}</textarea>
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
        </div>
        <div class="form-group mb-3">
            <label for="setting_key">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option>Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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

<script>
    $('#summernote').summernote({
        placeholder: 'Tulis konten artikel di sini...',
        tabsize: 2,
        height: 350,
        toolbar: [
          // Saya sederhanakan grupnya agar lebih muat di satu baris
          ['style', ['style']],
          ['font', ['bold', 'italic', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview']]
        ]
    });
</script>

@endsection