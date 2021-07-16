@extends('sbadmin2.master')
@section('title')
Edit User
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="col-md-8 mx-auto">
                <form action="{{route(('users.update'),$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input value="{{$user->name}}" type="text" class="form-control" id="nama" name="name" />
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input value="{{$user->username}}" type="text" class="form-control" id="username"
                                name="username" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection