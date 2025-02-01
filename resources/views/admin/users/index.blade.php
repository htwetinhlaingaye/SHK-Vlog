@extends('layouts.admin')
@section('content')
<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">User</h1>
        <a href="{{route('backend.users.create')}}" class="btn btn-primary float-end">Create user</a>
    </div>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">users</li>
    </ol>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            User Lists
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User Name</th>
                        <th>User Profile</th>
                        <th>User Email</th>
                        <th>Role</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>User Name</th>
                        <th>User Profile</th>
                        <th>User Email</th>
                        <th>Role</th>
                        <th>#</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach($users as $user)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$user->name}}</td>
                            <td><img src="{{$user->profile}}" width="50" height="50" alt=""></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                <a href="{{route('backend.users.edit',$user->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <button type="button" class="btn btn-sm btn-danger delete" data-id="{{$user->id}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-light">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Are you sure delete?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" id="deleteForm" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary btn-danger">Yes</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('tbody').on('click','.delete',function(){
                //alert('hello');
                let id = $(this).data('id');
                //console.log(id);
                $('#deleteForm').attr('action',`users/${id}`);
                $('#deleteModal').modal('show');
                
            })
        })
    </script>

@endsection