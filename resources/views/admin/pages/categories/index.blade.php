@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-end">
        <div class=""><a href="{{ route('admin.pages.posts.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
        </div>
    </div>
    <x-alert/>
    <div class="table-responsive">
        <table class="table">
            <th>#</th>
            <th>Title</th>
            <th>Status </th>
            <th>Date</th>
            <th>Action</th>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>
                   {{ $category->id }}
                      </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->status }}</td>
                    <td>{{ $category->created_at->format('d M y') }}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.pages.posts.destroy', $category->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete it?');">
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