@extends('layouts.admin')
@section('content')
        <div class="container-fluid px-4">
            
            <div class="mt-3">
                <h3 class="mt-4 d-inline">Edit Category</h3>
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
                    Edit Categories
                </div>
                <div class="card-body">
                    <form action="{{route('backend.categories.update',$category->id)}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{$category->name}}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="true">Image</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="new_image-tab" data-bs-toggle="tab" data-bs-target="#new_image" type="button" role="tab" aria-controls="new_image" aria-selected="false">New Image</button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="image-tab">
                                        <img src="{{$category->image}}" class="w-25 h-25 my-3" alt="">
                                        <input type="hidden" name="old_image" value="{{$category->image}}">
                                    </div>
                                    <div class="tab-pane fade" id="new_image" role="tabpanel" aria-labelledby="new_image-tab">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror my-3" accept="image/*" id="image" name="image" value="{{old('image')}}">
                                    </div>
                                </div>
                            
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
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