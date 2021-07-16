@extends('sbadmin2.master')
@section('title')
Edit User
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="col-md-8 mx-auto">
                <form action="{{route(('meetups.update'),$meetup->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Title</label>
                            <input type="text" value="{{$meetup->title}}" class="form-control" id="nama" name="title" />
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" id="gelar_s2" name="category">
                                <option label="Choose..."></option>
                                <option value="urgent" @if($meetup->category== 'urgent') selected @endif>Urgent</option>
                                <option value="important" @if($meetup->category== 'important') selected @endif>Important
                                </option>
                                <option value="feature" @if($meetup->category== 'feature') selected @endif>Feature
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="username">Hour</label>
                            <input type="time" value="{{$meetup->hour}}" class="form-control" id="username"
                                name="hour" />
                        </div>

                        <div class="form-group">
                            <label for="username">Description</label>
                            <input type="text" value="{{$meetup->description}}" class="form-control" id="username"
                                name="description" />
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