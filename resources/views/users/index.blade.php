

@extends('layouts.main')
@section('container')
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Master User</h1>
        @if (session('success'))
        <div class="row">
            <div class="col-lg-8">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
        </div>
        </div>
        @endif
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Master User</h6>
                <a href="/users/create" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)                                          
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role->label}}</td>
                                <td class="d-flex"><a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-warning mr-2 mb-2"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <form action="/users/{{$user->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" name="submit"  class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash" aria-hidden="true"></i>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection