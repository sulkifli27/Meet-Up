@extends('sbadmin2.master')
@section('title')
Add Komentar
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="col-md-8 mx-auto">
                <form action="{{route(('detail-meeting.update'),$detailMeeting->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Comment</label>
                            <input value="{{$detailMeeting->comment ??""}}" type="text" class="form-control" id="nama"
                                name="comment" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kommentar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection