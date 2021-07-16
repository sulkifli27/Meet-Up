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

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detailMeeting as $item)
                        <tr>
                            <td>{{$item->nama ?? " "}}</td>
                            <td>{{$item->judul ?? "" }}</td>
                            <td>{{$item->kategori ?? ""}}</td>
                            <td>{{$item->waktu ?? ""}}</td>
                            <td>{{$item->deskripsi ?? ""}}</td>
                            <td>{{$item->komentar ?? ""}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection