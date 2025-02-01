@extends('layouts.admin')
@section('content')
        <div class="container-fluid px-4">
            
            <div class="mt-3">
                <h3 class="mt-4 d-inline">Categories</h3>
                <a href="posts.php" class="btn btn-danger float-end">Cancel</a>
            </div>
            
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="posts.php">Categories</a></li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Create Categories
                </div>
                <div class="card-body">
                    <form action="{{route('backend.categories.store')}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{old('name')}}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" accept="image/*" id="image" name="image" value="{{old('image')}}">
                            @error('image')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection