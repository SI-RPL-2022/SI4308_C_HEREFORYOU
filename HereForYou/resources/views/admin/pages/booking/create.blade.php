@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>Buat Booking</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.bookings.store') }}" method="post" id="form">
                            @csrf
                            <div class="form-group formNone bank_id">
                                <label for="user_id">Nama User</label>
                                <select name="user_id" id="user_id"
                                    class="form-control @error('user_id') is-invalid @enderror">
                                    <option value="" disabled selected>-- Pilih Psikolog --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group formNone bank_id">
                                <label for="psychologist_id">Psychologist</label>
                                <select name="psychologist_id" id="psychologist_id"
                                    class="form-control @error('psychologist_id') is-invalid @enderror">
                                    <option value="" disabled selected>-- Pilih Psikolog --</option>
                                    @foreach ($psychologists as $psychologist)
                                        <option value="{{ $psychologist->id }}">{{ $psychologist->name }}</option>
                                    @endforeach
                                </select>
                                @error('psychologist_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group formNone">
                                <label for="package">Paket</label>
                                <select name="package" id="package"
                                    class="form-control @error('package') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih Paket --</option>
                                    <option value="Individu">Individu</option>
                                    <option value="Pasangan">Pasangan</option>
                                </select>
                                @error('package')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group formNone">
                                <label for="duration">Durasi (Jam)</label>
                                <input type="number" min="1" class="form-control @error('duration') is-invalid @enderror"
                                    id="duration" name="duration">
                                @error('duration')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group formNone">
                                <label for="media">Media</label>
                                <select name="media" id="media" class="form-control @error('media') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih Media --</option>
                                    <option value="Call Whatsapp">Call Whatsapp</option>
                                    <option value="Chat Whatsapp">Chat Whatsapp</option>
                                    <option value="Google Meet">Google Meet</option>
                                    <option value="Zoom">Zoom</option>
                                </select>
                                @error('media')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group time">
                                <label for="time">Atur Jadwal</label>
                                <div class="input-group date" id="time" data-target-input="nearest">
                                    <input type="text"
                                        class="form-control datetimepicker-input @error('time') is-invalid @enderror"
                                        data-target="#time" value="{{ old('time') }}" name="time" />
                                    <div class="input-group-append" data-target="#time" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                @error('time')
                                    <div class="invalid-feedback d-inline">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group formNone topic">
                                <label for="topic">Topik</label>
                                <select name="topic" id="topic" class="form-control @error('topic') is-invalid @enderror">
                                    <option value="" selected disabled>-- Pilih Topik --</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Pasangan">Pasangan</option>
                                    <option value="Trauma">Trauma</option>
                                    <option value="Seksualitas">Seksualitas</option>
                                </select>
                                @error('topic')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group formNone bank_id">
                                <label for="bank_id">Metode Pembayaran</label>
                                <select name="bank_id" id="bank_id"
                                    class="form-control @error('bank_id') is-invalid @enderror">
                                    <option value="" disabled selected>-- Pilih Metode Pembayaran --</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right btnBooking">Booking
                                Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush
@push('scripts')
    <!-- daterangepicker -->
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script>
        $(function() {
            $('#time').datetimepicker({

                icons: {
                    time: 'far fa-clock'
                },
                format: 'YYYY-MM-DD HH:mm:ss'

            });
        })
    </script>
@endpush
