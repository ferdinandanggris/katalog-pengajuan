@extends('layouts.main')
@section('container')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Master User</h1>
<div class="card shadow mb-4">
  <div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h6 class="m-0 font-weight-bold text-primary">Master User</h6>
</div>
<div class="card-body">
  <form action="/users" method="post">
    @csrf
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label required">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid  @enderror" id="name" placeholder="nama" name="name">
        @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
      @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label required">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control @error('email') is-invalid  @enderror" id="email" placeholder="Email" name="email">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="role_id" class="col-sm-2 col-form-label required">Role</label>
      <div class="col-sm-10">
        <select class="form-control" id="role_id" name="role_id">
            @foreach ($roles as $role)
                @if ($role->id == old('role_id'))
                    <option value="{{ $role->id }}" selected>{{ $role->label }}</option>
                @else
                    <option value="{{ $role->id }}">{{ $role->label }}</option>
                @endif
            @endforeach
        </select>
      </div>
  </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label required">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control  @error('password') is-invalid  @enderror" id="password" placeholder="Password" name="password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </form>
</div>
</div>
@endsection