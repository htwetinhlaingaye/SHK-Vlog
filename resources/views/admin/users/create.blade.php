@extends('layouts.admin')
@section('content')
    <!-- Page content-->
    <div class="container-fluid px-4">
        <h1 class="mt-4">Create User</h1>
        <a href="{{route('backend.users.index')}}" class="btn btn-danger float-end">Cancel</a>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active"><a href="{{route('backend.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('backend.users.index')}}">Users</a></li>
            <li class="breadcrumb-item active">Cancel</li>
        </ol>
        
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Create User
            </div>
            <div class="card-body">
                <form action="{{route('backend.users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name">
                        @error('name')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input class="form-control @error('phone') is-invalid @enderror" value="{{old('phone')}}" type="text" id="phone" name="phone">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="profile" class="form-label">Profile</label>
                        <input class="form-control @error('profile') is-invalid @enderror" accept="image/*" type="file" id="profile" name="profile">
                        @error('profile')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" type="text" id="email" name="email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" type="text" id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label fw-bold">Role</label>
                        <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                            <option value="User">User</option>
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
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
    </div>
@endsection