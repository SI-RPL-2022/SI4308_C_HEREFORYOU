@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-12">
            <h4 class="text-center">Booking</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Profil</h5>
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $psychologist->name }}</td>
                        </tr>
                        <tr>
                            <th>Spesialis</th>
                            <td>{{ $psychologist->specialist }}</td>
                        </tr>
                        <tr>
                            <th>Skor</th>
                            <td>
                                {{ $psychologist->rating() }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Form Booking</h5>
                    <form action="{{ route('booking.store') }}" method="post" id="form">
                        @csrf
                        <input type="text" hidden value="{{ $psychologist->id }}" name="psychologist_id">
                        <div class="form-group formNone">
                            <label for="package">Paket</label>
                            <select name="package" id="package" class="form-control @error('package') is-invalid @enderror">
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
                            <input type="number" min="1" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration">
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
                        <div class="form-group time d-none">
                            <label for="time">Atur Jadwal</label>
                            <div class="input-group date" id="time" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input @error('time') is-invalid @enderror" data-target="#time" value="{{ old('time') }}" name="time"/>
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
                        <div class="form-group formNone topic d-none">
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
                        <div class="form-group formNone bank_id d-none">
                            <label for="bank_id">Metode Pembayaran</label>
                            <select name="bank_id" id="bank_id" class="form-control @error('bank_id') is-invalid @enderror">
                                <option value="" disabled selected>-- Pilih Metode Pembayaran --</option>
                                @foreach ($pembayaran as $pem)
                                    <option value="{{ $pem->id }}">{{ $pem->name }}</option>
                                @endforeach
                            </select>
                            @error('bank_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="button" class="btn btn-primary float-right btnBooking d-none">Booking Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush
@push('scripts')
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
    $(function(){
        $('#package').on('change', function(){
            $('.btnBooking').removeClass('d-none');
        })
        $('.btnBooking').on('click', function(){
            $('.formNone').addClass('d-none');
            $('.time').removeClass('d-none');
            $(this).html('Jadwal Sudah Benar');
            $(this).on('click', function(){
                $('.time').addClass('d-none');
                $('.topic').removeClass('d-none');
                $(this).html('Lanjut Metode Pembayaran');
                $(this).on('click', function(){
                    $('.topic').addClass('d-none');
                    $('.bank_id').removeClass('d-none');
                    $(this).html('Lanjut Pembayaran');
                    $(this).on('click',function(){
                        $(this).attr('type','submit');
                    })
                })
            })
            // $('#form').submit();
        })
        $('#time').datetimepicker({

            icons: { time: 'far fa-clock' },
            format: 'YYYY-MM-DD HH:mm:ss'

        });
    })
</script>
@endpush
