@extends('layouts.app')
@section('title', 'List Category')
@section('content')
<div class="container">
    <x-alert />
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
                        <td>
                            {{-- Kolom Status di Tabel/List --}}
                            <div class="form-check form-switch">
                                <input class="form-check-input status-switch" type="checkbox" role="switch"
                                data-id="{{ $category->id }}"
                                {{ $category->status == 'Active' ? 'checked' : '' }}>
                            </div>
                        </td>
                        <td>

                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete it?');">
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
            <div class="card card-body">
                <form action="{{ route('admin.categories.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Special" value="{{ old('name') }}">
                    </div>
                    <div class="form-group mb-3">
                        <select name="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Nonactive">Nonactive</option>
                        </select>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const switches = document.querySelectorAll('.status-switch');

        switches.forEach(function (toggle) {
            toggle.addEventListener('change', function () {

                let postId = this.getAttribute('data-id');
                let isChecked = this.checked;

                let label = this.nextElementSibling;

                fetch(`/admin/categories/${postId}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        status: isChecked
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (label) {
                            label.textContent = data.new_status;
                        }

                        console.log('Sukses update status ke: ' + data.new_status);
                    } else {
                        alert('Gagal mengubah status');
                        this.checked = !isChecked;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    this.checked = !isChecked;
                });
            });
        });
    });

</script>

@endsection