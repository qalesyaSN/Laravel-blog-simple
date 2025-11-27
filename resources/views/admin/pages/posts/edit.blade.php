@extends('layouts.app')
@section('title', 'Edit Post') 
@section('content')

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<style>
    /* --- CUSTOM CSS NEO-BRUTALISM (SUPER COMPACT) --- */
    
    /* 1. Container Editor */
    .note-editor.note-frame {
        border: 2px solid #000 !important;
        box-shadow: 4px 4px 0px #000 !important;
        border-radius: 0.375rem !important;
        background-color: #fff;
        margin-bottom: 20px;
    }

    /* 2. Toolbar (Header) - Dibuat Sangat Rapat */
    .note-toolbar {
        border-bottom: 2px solid #000 !important;
        background-color: var(--bs-tertiary-bg) !important;
        border-radius: 0.375rem 0.375rem 0 0;
        padding: 4px !important; /* Padding sangat minim */
        display: flex;
        flex-wrap: wrap;
        gap: 4px; /* Jarak antar grup tombol cuma 4px */
        align-items: center;
    }

    /* 3. Reset Margin Bawaan Summernote/Bootstrap */
    .note-btn-group {
        margin: 0 !important; 
        padding: 0 !important;
        display: flex; /* Biar tombol dempet */
    }

    /* 4. Tombol Toolbar - Ukuran Kecil */
    .note-btn {
        border: 1px solid transparent !important; /* Border tipis transparan */
        background: transparent !important;
        color: #000 !important;
        font-weight: 600;
        border-radius: 2px !important;
        
        /* PENTING: Mengatur ukuran tombol agar tidak renggang */
        padding: 2px 6px !important; 
        font-size: 13px !important;
        line-height: 1.2 !important;
        height: 28px !important; /* Tinggi fix biar rapi */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Efek Hover Tombol */
    .note-btn:hover, .note-btn.active {
        background-color: #fff !important;
        border: 1px solid #000 !important;
        box-shadow: 1px 1px 0px #000 !important; /* Shadow kecil */
        color: #000 !important;
    }

    /* 5. Area Mengetik */
    .note-editable {
        background-color: #fff !important;
        font-family: 'Epilogue', sans-serif;
        font-size: 1rem;
        min-height: 300px;
        padding: 15px !important;
    }

    /* 6. Tombol Code View Aktif */
    .note-btn.btn-codeview.active {
        background-color: #000 !important;
        color: #a2e436 !important; /* Hijau Neon */
    }

    /* 7. Dropdown Menu (Font, Color, dll) */
    .note-dropdown-menu {
        border: 2px solid #000 !important;
        border-radius: 0 !important;
        box-shadow: 4px 4px 0px #000 !important;
    }
    .note-dropdown-item:hover {
        background-color: var(--bs-primary) !important;
    }
    
    /* 8. Status Bar Bawah */
    .note-statusbar {
        border-top: 2px solid #000 !important;
        background-color: var(--bs-tertiary-bg) !important;
        border-radius: 0 0 0.375rem 0.375rem;
    }
    
    /* Perbaikan icon agar pas di tengah */
    .note-btn i, .note-btn span {
        margin: 0 !important;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">Edit Post</div>
        <div class="card-body">
            
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label class="fw-bold mb-1">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold mb-1">Content</label>
                    
                    <textarea id="summernote" name="content">{{ old('content', $post->content) }}</textarea>

                    @error('content')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold mb-1">Thumbnail</label>
                    <input type="file" class="form-control" name="thumbnail">
                    @if($post->thumbnail)
                        <div class="mt-2 p-1 border border-dark rounded" style="width: 150px;">
                            <img src="/storage/{{ $post->thumbnail }}" width="100%">
                        </div>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="fw-bold mb-1">Category</label>
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
 