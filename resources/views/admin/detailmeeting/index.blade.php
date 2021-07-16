@extends('sbadmin2.master')
@section('title')
Room Meet Up
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <a href="{{route('detail-meeting.create')}}" type="button"
                class="btn btn-primary btn-circle btn-sm button-update">
                invite
            </a>

            <div class="table-responsive mt-3">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Waktu</th>
                            <th>Deskripsi</th>
                            <th>Komentar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($detailMeeting as $item) --}}
                        <tr>
                            <td>{{$detailMeeting->nama ?? " "}}</td>
                            <td>{{$detailMeeting->judul ?? "" }}</td>
                            <td>{{$detailMeeting->kategori ?? ""}}</td>
                            <td>{{$detailMeeting->waktu ?? ""}}</td>
                            <td>{{$detailMeeting->deskripsi ?? ""}}</td>
                            <td>{{$detailMeeting->komentar ?? ""}}</td>
                            <td>
                                <a href="{{route('detail-meeting.edit',$detailMeeting->id ?? "")}}"
                                    class="btn btn-warning  btn-sm button-update" type="button">
                                    komentar
                                </a>

                                <form action="{{route('detail-meeting.destroy',$detailMeeting->id ?? "")}}"
                                    method="post" class="form-check-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection