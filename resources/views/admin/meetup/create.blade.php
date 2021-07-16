@extends('sbadmin2.master')
@section('title')
Edit User
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="col-md-8 mx-auto">
                <form action="{{route('meetups.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Title</label>
                            <input type="text" class="form-control" id="nama" name="title" />
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="gelar_s2" name="category">
                                <option label="Choose..."></option>
                                <option value="urgent">Urgent</option>
                                <option value="important">Important</option>
                                <option value="feature">Feature</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username">Hour</label>
                            <input type="time" class="form-control" id="username" name="hour" />
                        </div>

                        <div class="form-group">
                            <label for="username">Description</label>
                            <input type="text" class="form-control" id="username" name="description" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Invite</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection