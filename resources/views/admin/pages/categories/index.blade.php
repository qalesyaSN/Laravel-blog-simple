@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex justify-content-end">
        <div class=""><a href="{{ route('admin.pages.categories.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
        </div>
    </div>
    <x-alert/>
    <div class="row">
    <div class="col-md-6">
        <table class="table">
            <th>Title</th>
            <th>Status </th>
            <th>Action</th>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
      </div></td>
                    <td>
                        
                        <form action="{{ route('admin.pages.categories.destroy', $category->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete it?');">
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
    <div class="col-md-6">
        <table class="table">
            <th>Title</th>
            <th>Status </th>
            <th>Action</th>
            <tbody>
                @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td><div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
      </div></td>
                    <td>
                        
                        <form action="{{ route('admin.pages.categories.destroy', $category->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete it?');">
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
</div>

@endsection