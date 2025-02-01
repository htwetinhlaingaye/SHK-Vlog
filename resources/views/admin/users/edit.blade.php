@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Users</h1>
        <a href="{{route('backend.users.index')}}" class="btn btn-danger float-end">Cancel</a>
    </div>
    <ol class="breadcrumb mb-4 ps-4">
        <li class="breadcrumb-item"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('backend.categories.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>
    <div class="card mb-4 m-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Edit User
        </div>
        <div class="card-body">
            <form action="{{route('backend.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" id="name" name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone}}" id="phone" name="phone">
                    @error('phone')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="new_profile-tab" data-bs-toggle="tab" data-bs-target="#new_profile-tab-pane" type="button" role="tab" aria-controls="new_profile-tab-pane" aria-selected="false">New Profile</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <img src="{{$user->profile}}" alt="" class="w-25 h-25 my-3">
                            <input type="hidden" name="old_profile" id="" value="{{$user->profile}}"> 
                        </div>
                        <div class="tab-pane fade" id="new_profile-tab-pane" role="tabpanel" aria-labelledby="new_profile-tab" tabindex="0">
                            <input type="file" accept="image/*" class="form-control my-3 @error('profile') is-invalid @enderror" value="{{old('profile')}}" id="profile" name="profile">
                        </div>
                    </div>
                    @error('profile')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" id="email" name="email">
                    @error('email')
                        <div class="invalid-feedback">{{$message}} </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label fw-bold">Role</label>
                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                        <option value="User" {{$user->role == "User" ? 'selected':''}}>User</option>
                        <option value="Admin" {{$user->role == "Admin" ? 'selected':''}}>Admin</option>
                        <option value="Super Admin" {{$user->role == "SuperAdmin" ? 'selected':''}}>Super Admin</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message}} </div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection