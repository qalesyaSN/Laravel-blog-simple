@extends('layouts.app')
@section('title', 'Add Post')
@section('content')
<style>
    /* --- Kustomisasi Quill.js agar sesuai tema Brite --- */

/* 1. Container Utama (Wrapper) */
.quill-wrapper {
    position: relative;
    border: 2px solid #000; /* Border tebal khas tema */
    border-radius: 0.375rem; /* Sesuai var(--bs-border-radius) */
    background-color: #fff;
    /* Efek Shadow Solid khas tema Anda */
    box-shadow: 4px 4px 0px #000; 
    transition: transform 0.15s ease, box-shadow 0.15s ease;
    margin-bottom: 1.5rem; /* Memberi jarak ke bawah */
}

/* Efek Hover (opsional, biar interaktif seperti tombol tema Anda) */
.quill-wrapper:hover {
    transform: translate(-2px, -2px);
    box-shadow: 6px 6px 0px #000;
}

/* 2. Bagian Toolbar (Header Editor) */
.ql-toolbar.ql-snow {
    border: none !important;
    border-bottom: 2px solid #000 !important; /* Garis pemisah toolbar & konten */
    background-color: var(--bs-tertiary-bg); /* Warna abu-abu muda tema */
    border-radius: 0.375rem 0.375rem 0 0;
    font-family: 'Epilogue', sans-serif;
}

/* 3. Bagian Konten (Area Mengetik) */
.ql-container.ql-snow {
    border: none !important;
    font-family: 'Epilogue', sans-serif; /* Font utama tema Anda */
    font-size: 1rem;
    min-height: 200px; /* Tinggi minimal editor */
    background-color: #fff;
    border-radius: 0 0 0.375rem 0.375rem;
}

/* 4. Mengubah Warna Icon Toolbar */
/* Default icon hitam */
.ql-snow .ql-stroke {
    stroke: #000 !important; 
}
.ql-snow .ql-fill {
    fill: #000 !important;
}

/* Saat Hover atau Aktif -> Jadi Hijau (#a2e436 - var(--bs-primary)) */
.ql-snow .ql-picker.ql-expanded .ql-picker-label .ql-stroke,
.ql-snow button:hover .ql-stroke, 
.ql-snow button.ql-active .ql-stroke {
    stroke: var(--bs-primary) !important;
}
.ql-snow button:hover .ql-fill, 
.ql-snow button.ql-active .ql-fill {
    fill: var(--bs-primary) !important;
}

/* Garis bawah pada dropdown color/background */
.ql-snow .ql-picker-label::before {
    color: #000;
}

</style>
<div class="container">
    <!--x-alert /-->
    <div class="card">
        <div class="card-header">Add Post</div>
        <div class="card-body">
    <form action="{{ route('admin.pages.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
            <textarea class="form-control @error('title') is-invalid @enderror" id="content" name="content">{{ $post->content }}</textarea>
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





<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
  var quill = new Quill('#content', {
    theme: 'snow' // atau 'bubble' untuk tampilan melayang
  });
</script>

@endsection