@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-end">
        <div class=""><a href="{{ route('admin.pages.posts.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table">
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th>Author</th>
            <th>Date</th>
            <th>Action</th>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>
                    <img style="border-radius:5px" src="/storage/{{ $post->thumbnail }}" width="50px" />
                      </td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit(strip_tags($post->content), 10, '..') }}</td>
                    <td>{{ $post->category ->name}}</td>
                    <td>{{ $post->author->name }}</td>
                    <td>{{ $post->created_at->format('d m y') }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.pages.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7"><center><i class="text-center">Tidak ada data !</i></center></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection