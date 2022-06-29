@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mt-2">
      <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ auth()->user()->avatar() }}"
                   alt="Foto {{ auth()->user()->name }}">
            </div>

            <h3 class="profile-username text-center">{{ auth()->user()->username }}</h3>

            <p class="text-muted text-center">{{ auth()->user()->role }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Name</b> <a class="float-right text-dark small">{{ auth()->user()->name }}</a>
              </li>
              <li class="list-group-item">
                <b>Username</b> <a class="float-right text-dark small">{{ auth()->user()->username }}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right text-dark small">{{ auth()->user()->email }}</a>
              </li>
              <li class="list-group-item">
                <b>Bergabung pada </b></b> <a class="float-right small text-dark">{{ auth()->user()->created_at->translatedFormat('l, d F Y') }}</a>
              </li>
              <li class="list-group-item">
                <b>Terakhir Diperbaharui pada</b> <a class="float-right small text-dark">{{ auth()->user()->updated_at->translatedFormat('l, d F Y') }}</a>
              </li>
            </ul>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h6 class="text-center">Edit Profile</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ auth()->user()->name ?? old('name') }}">
                        @error('name')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ auth()->user()->username ?? old('username') }}" @if(auth()->user()->role !== 'admin') readonly @endif>
                        @error('username')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ auth()->user()->email ?? old('email') }}" @if(auth()->user()->role !== 'admin') readonly @endif>
                        @error('email')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                        @error('password')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar" value="{{ old('avatar') }}">
                        @error('avatar')
                            <div class="is-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group d-flex justify-content-between">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</div>
@endsection
@push('styles')
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
@if (session('success'))
<script>
    toastr.success('{{ session('success') }}.')
</script>
@endif
@if (session('error'))
<script>
    toastr.error('{{ session('error') }}.')
</script>
@endif
@endpush
