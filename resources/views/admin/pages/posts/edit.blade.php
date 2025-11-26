@extends('layouts.app')
@section('title', 'Edit Post') @section('content')

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<style>
    /* --- CSS Kustom Anda --- */
    .quill-wrapper {
        position: relative;
        border: 2px solid #000;
        border-radius: 0.375rem;
        background-color: #fff;
        box-shadow: 4px 4px 0px #000;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
        margin-bottom: 1.5rem;
    }

    .quill-wrapper:hover {
        transform: translate(-2px, -2px);
        box-shadow: 6px 6px 0px #000;
    }

    .ql-toolbar.ql-snow {
        border: none !important;
        border-bottom: 2px solid #000 !important;
        background-color: var(--bs-tertiary-bg);
        border-radius: 0.375rem 0.375rem 0 0;
        font-family: 'Epilogue', sans-serif;
    }

    .ql-container.ql-snow {
        border: none !important;
        font-family: 'Epilogue', sans-serif;
        font-size: 1rem;
        min-height: 200px;
        background-color: #fff;
        border-radius: 0 0 0.375rem 0.375rem;
    }

    /* Kustomisasi Warna Icon */
    .ql-snow .ql-stroke { stroke: #000 !important; }
    .ql-snow .ql-fill { fill: #000 !important; }
    
    .ql-snow .ql-picker.ql-expanded .ql-picker-label .ql-stroke,
    .ql-snow button:hover .ql-stroke, 
    .ql-snow button.ql-active .ql-stroke {
        stroke: var(--bs-primary) !important;
    }
    .ql-snow button:hover .ql-fill, 
    .ql-snow button.ql-active .ql-fill {
        fill: var(--bs-primary) !important;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header">Edit Post</div>
        <div class="card-body">
            <form id="postForm" action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label for="setting_key">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title" value="{{ $post->title }}">
                    @error('title')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="content">Content</label>
                    
                    <input type="hidden" name="content" id="content_input">

                    <div class="quill-wrapper">
                        <div id="editor-container">
                            {!! $post->content !!}
                        </div>
                    </div>

                    @error('content')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="setting_key">Thumbnail</label>
                    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail">
                    @error('thumbnail')
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
                    @enderror
                    @if($post->thumbnail)
                    <div class="col-6 card card-body mt-2">
                        <img src="/storage/{{ $post->thumbnail }}" width="100%">
                    </div>
                    @endif
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
                        <div class="alert alert-danger mt-2 p-2">{{ $message }}</div>
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
  var quill = new Quill('#editor-container', {
    theme: 'snow',
    placeholder: 'Tulis konten artikel di sini...',
    modules: {
        toolbar: {
            container: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image', 'code-block'],
                ['clean']
            ],
            handlers: {
                'link': function(value) {
                    if (value) {
                        var href = prompt('Masukkan URL Link:'); // Munculkan Pop-up input
                        if (href) {
                            this.quill.format('link', href);
                        } else {
                            this.quill.format('link', false); // Batal jika kosong
                        }
                    } else {
                        this.quill.format('link', false);
                    }
                }
            }
        }
    }
  });

  // --- Logic Simpan Form (Tetap sama seperti sebelumnya) ---
  var form = document.getElementById('postForm');
  form.onsubmit = function() {
      var contentInput = document.getElementById('content_input');
      contentInput.value = quill.root.innerHTML;
  };
</script>

@endsection
