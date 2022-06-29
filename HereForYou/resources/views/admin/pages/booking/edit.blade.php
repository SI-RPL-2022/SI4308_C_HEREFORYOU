@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Booking</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.bookings.update',$item->id) }}" method="post" id="form">
                            @csrf
                            @method('patch')
                            <div class="form-group formNone bank_id">
                                <label for="user_id">Nama User</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $item->user->name }}" readonly>
                                @error('user_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group formNone bank_id">
                                <label for="psychologist_id">Psychologist</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $item->psychologist->name }}" readonly>
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
                                    <option @if($item->package === 'Individu') selected @endif value="Individu">Individu</option>
                                    <option @if($item->package === 'Pasangan') selected @endif value="Pasangan">Pasangan</option>
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
                                    id="duration" name="duration" value="{{ $item->duration }}">
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
                                    <option @if($item->media === 'Call Whatsapp') selected @endif value="Call Whatsapp">Call Whatsapp</option>
                                    <option @if($item->media === 'Chat Whatsapp') selected @endif value="Chat Whatsapp">Chat Whatsapp</option>
                                    <option @if($item->media === 'Google Meet') selected @endif value="Google Meet">Google Meet</option>
                                    <option @if($item->media === 'Zoom') selected @endif value="Zoom">Zoom</option>
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
                                        data-target="#time" value="{{ $item->time ?? old('time') }}" name="time" />
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
                                    <option @if($item->topic === 'Keluarga') selected @endif value="Keluarga">Keluarga</option>
                                    <option @if($item->topic === 'Pasangan') selected @endif value="Pasangan">Pasangan</option>
                                    <option @if($item->topic === 'Trauma') selected @endif value="Trauma">Trauma</option>
                                    <option @if($item->topic === 'Seksualitas') selected @endif value="Seksualitas">Seksualitas</option>
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
                                        <option @if($bank->id == $bank_item->id) selected @endif value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right btnBooking">Update</button>
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
