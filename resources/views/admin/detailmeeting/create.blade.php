@extends('sbadmin2.master')
@section('title')
Edit User
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="col-md-8 mx-auto">
                <form action="{{route('detail-meeting.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>User</label>
                        <select class="form-control" name="user_id">
                            <option label="Choose..."></option>
                            @foreach($users as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Room</label>
                        <select class="form-control" name="meetup_id">
                            <option label="Choose..."></option>
                            @foreach($rooms as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
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