@extends('layouts.app')
@section('title', 'Edit Post') 
@section('content')

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
    /* --- CSS Editor Neo-Brutalism --- */
    .quill-wrapper {
        position: relative;
        border: 2px solid #000;
        border-radius: 0.375rem;
        background-color: #fff;
        box-shadow: 4px 4px 0px #000;
        margin-bottom: 1.5rem;
    }
    
    /* Toolbar Styling */
    .ql-toolbar.ql-snow {
        border: none !important;
        border-bottom: 2px solid #000 !important;
        background-color: var(--bs-tertiary-bg);
        border-radius: 0.375rem 0.375rem 0 0;
        font-family: 'Epilogue', sans-serif;
        padding: 10px;
    }

    /* Container Styling */
    .ql-container.ql-snow {
        border: none !important;
        font-family: 'Epilogue', sans-serif;
        font-size: 1rem;
        min-height: 300px;
        background-color: #fff;
        border-radius: 0 0 0.375rem 0.375rem;
    }

    /* Warna Icon Default */
    .ql-snow .ql-stroke { stroke: #000 !important; }
    .ql-snow .ql-fill { fill: #000 !important; }
    
    /* Warna Icon Saat Hover/Aktif (Hijau) */
    .ql-snow button:hover .ql-stroke, 
    .ql-snow button.ql-active .ql-stroke {
        stroke: var(--bs-primary) !important;
    }
    .ql-snow button:hover .ql-fill, 
    .ql-snow button.ql-active .ql-fill {
        fill: var(--bs-primary) !important;
    }

    /* Styling KHUSUS Tombol HTML Code (Agar Beda Warna) */
    .ql-htmlCode svg .ql-stroke {
        stroke: #a2e436 !important; /* Warna Hijau Neon untuk Icon Code */
        stroke-width: 2.5;
    }
    .ql-htmlCode:hover svg .ql-stroke {
        stroke: #000 !important; /* Jadi hitam saat hover */
    }

    /* Textarea Modal Coding */
    #htmlCodeInput {
        font-family: 'Courier New', Courier, monospace;
        font-size: 14px;
        color: #a2e436; 
        background-color: #1a1a1a;
        border: none;
        resize: none; 
        outline: none;
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
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                </div>

                <div class="form-group mb-3">
                    <label>Content</label>
                    <input type="hidden" name="content" id="content_input">

                    <div class="quill-wrapper">
                        <div id="editor-container">
                            {!! old('content', $post->content) !!}
                        </div>
                    </div>
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

<div class="modal fade" id="htmlEditorModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content" style="border: 3px solid #000; box-shadow: 8px 8px 0px #000; border-radius: 0;">
      <div class="modal-header" style="background-color: #fff; border-bottom: 3px solid #000;">
        <h5 class="modal-title fw-bold">&lt;/&gt; Edit HTML Source</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <textarea id="htmlCodeInput" class="form-control p-3" style="height: 450px;"></textarea>
      </div>
      <div class="modal-footer" style="background-color: #f8f9fa; border-top: 3px solid #000;">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btnSaveHtml">Simpan Perubahan</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
  // --- A. Setup Icon Tombol HTML (Warna Hijau) ---
  var icons = Quill.import('ui/icons');
  // Kita pakai class 'htmlCode' agar unik dan tidak bentrok
  icons['htmlCode'] = '<svg viewBox="0 0 18 18"><polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"/><polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"/><line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"/></svg>';

  // --- B. Inisialisasi Quill ---
  var quill = new Quill('#editor-container', {
    theme: 'snow',
    placeholder: 'Tulis konten artikel di sini...',
    modules: {
        toolbar: {
            container: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'], 
                ['blockquote', 'code-block'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'align': [] }],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'image', 'video'],
                
                // Masukkan nama tombol kita di sini
                ['htmlCode'] 
            ]
            // HAPUS bagian 'handlers' dari sini agar tidak error/bentrok.
            // Kita akan pasang handler secara manual di bawah (Point C).
        }
    }
  });

  // --- C. Pasang Handler Secara Manual (Lebih Stabil) ---
  // Ini memastikan tombol berfungsi sebagai AKSI, bukan format toggle
  var toolbar = quill.getModule('toolbar');
  
  toolbar.addHandler('htmlCode', function() {
      // 1. Ambil HTML dari editor
      var htmlContent = quill.root.innerHTML;
      
      // 2. Masukkan ke textarea modal
      document.getElementById('htmlCodeInput').value = htmlContent;
      
      // 3. Panggil Modal Bootstrap
      // Pastikan library Bootstrap JS sudah terload!
      try {
          var myModal = new bootstrap.Modal(document.getElementById('htmlEditorModal'));
          myModal.show();
      } catch (e) {
          alert("Error: Bootstrap JS belum terload. Cek console browser.");
          console.error(e);
      }
  });

  // Handler Link (Manual) agar pop-up text muncul
  toolbar.addHandler('link', function(value) {
        if (value) {
            var href = prompt('Masukkan URL Link:');
            if (href) {
                var range = quill.getSelection();
                if (range.length == 0) {
                    var text = prompt('Masukkan Teks Link:');
                    if(text) quill.insertText(range.index, text, 'link', href);
                } else {
                    quill.format('link', href);
                }
            }
        } else {
            quill.format('link', false);
        }
  });


  // --- D. Logic Simpan HTML dari Modal ke Editor ---
  document.getElementById('btnSaveHtml').addEventListener('click', function() {
      var code = document.getElementById('htmlCodeInput').value;
      
      // Paste HTML secara aman ke editor
      quill.root.innerHTML = code;
      
      // Tutup Modal (Cari elemen modal yang sedang aktif)
      var modalEl = document.getElementById('htmlEditorModal');
      var modal = bootstrap.Modal.getInstance(modalEl);
      modal.hide();
  });

  // --- E. Logic Submit Form ---
  var form = document.getElementById('postForm');
  form.addEventListener('submit', function(e) {
      var contentInput = document.getElementById('content_input');
      contentInput.value = quill.root.innerHTML;
  });

</script>

@endsection
