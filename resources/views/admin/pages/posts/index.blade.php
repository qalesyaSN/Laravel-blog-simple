@extends('layouts.app')
@section('title', 'List Post')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end">
        <div class=""><a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-lg me-1"></i> Add Post</a>
        </div>
    </div>


<x-alert/>

<div class="card">
<div class="list-group list-group-flush">
@forelse($posts as $post)
<div class="list-group-item p-3 border-bottom">
    
    <div class="d-md-none mb-3">
        <img src="/storage/{{ $post->thumbnail }}" 
             class="w-100 b-img" 
             style="height: 200px; object-fit: cover;">
    </div>

    <div class="row align-items-center g-3">

        <div class="col-md-auto d-none d-md-block">
            <img src="/storage/{{ $post->thumbnail }}" 
                 class="b-img" 
                 style="width: 70px; height: 70px; object-fit: cover;">
        </div>

        <div class="col-12 col-md">
            <h5 class="mb-1 fw-bold text-truncate">
                <a href="#" class="text-decoration-none text-dark">
                    {{ $post->title }}
                </a>
            </h5>
            
            {{-- Meta Data --}}
            <div class="small text-muted d-flex flex-wrap gap-2 align-items-center">
                
                {{-- Status Badge --}}
                <span class="badge rounded-pill {{ $post->status == 'Published' ? 'bg-success' : 'bg-danger' }}">
                    {{ $post->status }}
                </span>

                {{-- Info Lain --}}
                <span><i class="bi bi-folder2-open"></i> {{ $post->category ? $post->category->name : 'None' }}</span>
                <span class="d-none d-md-inline">|</span> {{-- Separator --}}
                <span><i class="bi bi-person"></i> {{ $post->author->name }}</span>
                <span class="d-none d-md-inline">|</span>
                <span><i class="bi bi-calendar3"></i> {{ $post->created_at->format('d M y') }}</span>
            </div>
        </div>

        {{-- 5. TOMBOL ACTION --}}
        {{-- col-12 di mobile, col-md-auto di desktop --}}
        <div class="col-12 col-md-auto">
            <div class="d-flex gap-2 justify-content-end">
                {{-- Tombol Edit --}}
                <a href="{{ route('admin.posts.edit', $post->id) }}" 
                   class="btn btn-sm btn-warning"
                   title="Edit">
                    <i class="bi bi-pencil"></i>
                </a>

                {{-- Tombol Deletess --}}
                <form action="{{ route('admin.posts.destroy', $post->id) }}" 
                      method="POST" 
                      class="d-inline" 
                      onsubmit="return confirm('Yakin hapus?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@empty

<div class="text-center p-3">
    <h4>No posts yet!</h4>
</div>
@endforelse


</div>
</div>

<div class="mt-4">
{{ $posts->links('vendor.pagination.bootstrap-5') }}
</div>
</div>
@endsection
