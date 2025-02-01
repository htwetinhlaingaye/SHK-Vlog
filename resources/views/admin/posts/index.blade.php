@extends('layouts.admin')
@section('content')
                    <div class="container-fluid px-4">
                        <div class="my-3">
                            <h1 class="mt-4 d-inline">Posts</h1>
                            <a href="{{route('backend.posts.create')}}" class="btn btn-primary float-end">Create Post</a>
                        </div>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>#</th>
                                    </tfoot>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$post->title}}</td>
                                                <td><img src="{{$post->image}}" width="100" height="100"  alt=""></td>
                                                <td>{{$post->category_id}}</td>
                                                <td>
                                                    <a href="{{route('backend.posts.edit',$post->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                    <button class="btn btn-sm btn-danger delete" data-id="{{$post->id}}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$posts->links()}}
                            </div>
                        </div>
                    </div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title  text-light" id="exampleModalLabel">Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form action="" id="deleteform" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Yes</button>
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
                // alert('hello');
                let id = $(this).data('id');
                $('#deleteform').attr('action',`posts/${id}`);
                $('#deleteModal').modal('show');
                // console.log(id);
            })
        })
    </script>
@endsection