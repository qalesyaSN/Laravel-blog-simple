@extends('layouts.app')
@section('title', 'Edit Post') 
@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link href="{{ asset('assets/css/summernote.css') }}"  rel="stylesheet">
<div class="container">
    <div class="card">
        <div class="card-header">Edit Post</div>
        <div class="card-body">
            
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Content</label>
                    
                    <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>

                    @error('content')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail">
                    @if($post->thumbnail)
                        <div class="mt-2 p-1 border border-dark rounded" style="width: 150px;">
                            <img src="/storage/{{ $post->thumbnail }}" width="100%">
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id) == $category->id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-secondary" name="status" value="Draft">Draft</button>
                    <button type="submit" class="btn btn-primary" name="status" value="Published">Publish</button>
                </div>
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
 