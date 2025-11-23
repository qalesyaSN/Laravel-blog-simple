@extends('layouts.app')
@section('content')
<div class="container">
<div class="d-flex justify-content-end">
  <div class=""><a href="{{ route('admin.pages.settings.create') }}" class="btn btn-primary mb-3">Add</a></div>
</div>

<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card mb-3">
        <div class="card-header">Site Setting</div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="{{ $settings['site_title'] }}">Site Title</label>
                <input type="text" class="form-control" value="{{ $settings['site_title'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="{{ $settings['site_description'] }}">Site Description</label>
                <textarea class="form-control" name="site_description">{{ $settings['site_description'] }}</textarea>
            </div>
        </div>
    </div>
    
    <div class="card mb-3">
        <div class="card-header">Site Setting</div>
        <div class="card-body">
            <div class="form-group mb-3">
                <label for="{{ $settings['site_title'] }}">Site Title</label>
                <input type="text" class="form-control" value="{{ $settings['site_title'] }}">
            </div>
            <div class="form-group mb-3">
                <label for="{{ $settings['site_description'] }}">Site Description</label>
                <textarea class="form-control" name="site_description">{{ $settings['site_description'] }}</textarea>
            </div>
        </div>
    </div>
    
      <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mx-2">Update</button>
                 <button type="submit" class="btn btn-secondary">Cancel</button>
            </div>
            
</form>


</div>
@endsection