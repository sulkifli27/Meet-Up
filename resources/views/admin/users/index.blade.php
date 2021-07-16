@extends('sbadmin2.master')
@section('title')
Users
@endsection

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $no => $item)
                        <tr>
                            <td>{{$no + 1}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->username}}</td>
                            <td>
                                <a href="{{route('users.edit',$item->id)}}"
                                    class="btn btn-warning btn-circle btn-sm button-update" type="button"><i
                                        class="fas fa-edit"></i>
                                </a>

                                <form action="{{route('users.destroy',$item->id)}}" method="post"
                                    class="form-check-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection