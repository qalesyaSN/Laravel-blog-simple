@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Add Settings</div>
        <div class="card-body">
    <form action="{{ route('admin.pages.settings.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="setting_key">Setting Key</label>
            <input type="text" class="form-control @error('setting_key') is-invalid @enderror" name="setting_key" placeholder="site_title" value="{{ old('setting_key') }}">
            @error('setting_key')
            <div class="alert alert-danger mt-2 p-2">
            {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="setting_value">Setting Value</label>
            <textarea class="form-control" name="setting_value"></textarea>
        </div>
        <input type="text" name="user_id" value="">
        <button type="submit" class="btn btn-primary w-100">Add</button>
    </form>
    </div>
    </div>
</div>
@endsection