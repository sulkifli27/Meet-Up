@extends('sbadmin2.master')
@section('title')
Room Meet Up
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <a href="{{route('meetups.create')}}" type="button" class="btn btn-primary btn-circle btn-sm button-update">
                <i class="fas fa-plus"></i>
            </a>

            <div class="table-responsive mt-3">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Waktu</th>
                            <th>Deskripsi</th>
                            <th>Pembuat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($meetups as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->hour}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->maker}}</td>
                            @if ($item->maker == Auth::user()->name)
                            <td>
                                <a href="{{route('meetups.edit',$item->id)}}"
                                    class="btn btn-warning btn-circle btn-sm button-update" type="button"><i
                                        class="fas fa-edit"></i>
                                </a>

                                <form action="{{route('meetups.destroy',$item->id)}}" method="post"
                                    class="form-check-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @else
                            <td>Null</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection