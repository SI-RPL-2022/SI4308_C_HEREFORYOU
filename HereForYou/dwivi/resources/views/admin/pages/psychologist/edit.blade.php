@extends('admin.layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="text-dark text-center">Edit Psikolog</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.psychologists.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name ?? old('name') }}" autofocus>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="specialist">Spesialis</label>
                            <input type="text" name="specialist" id="specialist" class="form-control @error('specialist') is-invalid @enderror" value="{{ $item->specialist ?? old('specialist') }}">
                            @error('specialist')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat</label>
                        <textarea name="address" id="" cols="30" rows="3" class="form-control @error('specialist') is-invalid @enderror" name="address">{{ $item->address ?? old('address') }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">No. Telepon</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ $item->phone_number ?? old('phone_number') }}">
                        @error('phone_number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $item->email ?? old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price_hourly">Tarif (Jam)</label>
                        <input type="integer" name="price_hourly" id="price_hourly" class="form-control @error('price_hourly') is-invalid @enderror" value="{{ $item->price_hourly ?? old('price_hourly') }}">
                        @error('price_hourly')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option @if($item->status == 1) selected @endif value="1" selected>Aktif</option>
                            <option @if($item->status == 0) selected @endif value="0">Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="photo">Gambar</label>
                            <img src="{{ $item->photo() }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-9">
                            <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}">
                            @error('photo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.psychologists.index') }}" class="btn btn-warning">Batal</a>
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection