@extends('auth.layouts.app')
@section('title','Login')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="#" class="mb-5">
        <img src="{{ asset('assets/image/logohfy2.png') }}" alt="" class="img-fluid mb-4">
      </a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Register a new membership</p>
    
          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password" name="password_confirmation">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              @error('password_confirmation')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row justify-content-end">
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
    
          <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
</div>
@endsection