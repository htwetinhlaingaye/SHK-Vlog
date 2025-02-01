@extends('layouts.admin')
@section('content')
        <div class="container-fluid px-4">
            
            <div class="mt-3">
                <h3 class="mt-4 d-inline">Edit Posts</h3>
                <a href="posts.php" class="btn btn-danger float-end">Cancel</a>
            </div>
            
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="posts.php">Posts</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Edit Posts
                </div>
                <div class="card-body">
                    <form action="{{route('backend.posts.update',$post->id)}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$post->title}}">
                            @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category_id">Categories</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                <option value="">Choose category</option>
                                @foreach ($categories as $category)
                                
                                <option value="{{$category->id}}" {{$post->category_id == $category->id?'selected':''}}>
                                        {{$category->name}}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{$message}}</div>
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
                                        <img src="{{$post->image}}" class="w-25 h-25 my-3" alt="">
                                        <input type="hidden" name="old-image" value="{{$post->image}}">
                                    </div>
                                    <div class="tab-pane fade" id="new_image" role="tabpanel" aria-labelledby="new_image-tab">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror my-3" accept="image/*" id="image" name="image" value="{{old('image')}}">
                                    </div>
                                </div>
                            
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{$post->description}}</textarea>
                            @error('description')
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