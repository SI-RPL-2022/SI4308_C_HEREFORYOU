@extends('admin.layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h6 class="text-dark text-center">Edit Jadwal Psikolog {{ $item->psychologist->name }}</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.schedules.update',$item->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="day">Hari</label>
                       <select name="day" id="day" class="form-control">
                           @foreach ($days as $day)
                               <option @if($day === $item->day) selected @endif value="{{ $day }}">{{ $day }}</option>
                           @endforeach
                       </select>
                        @error('day')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="opened_at">Jam Buka</label>
                        <div class="input-group date" id="opened_at" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input @error('opened_at') is-invalid @enderror" data-target="#opened_at" value="{{ $item->opened_at ?? old('opened_at') }}" name="opened_at" />
                            <div class="input-group-append" data-target="#opened_at" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('opened_at')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="closed_at">Jam Tutup</label>
                        <div class="input-group date" id="closed_at" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input @error('closed_at') is-invalid @enderror" data-target="#closed_at" value="{{ $item->closed_at ?? old('closed_at') }}" name="closed_at" />
                            <div class="input-group-append" data-target="#closed_at" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                        @error('closed_at')
                            <div class="invalid-feedback d-inline">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.psychologists.show',$item->psychologist_id) }}" class="btn btn-warning">Batal</a>
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
@push('scripts')
<script>
    //Date and time picker
    $('#opened_at').datetimepicker({
        
        icons: { time: 'far fa-clock' },
        format: 'HH:mm:ss',

    });
    $('#closed_at').datetimepicker({
        
        icons: { time: 'far fa-clock' },
        format: 'HH:mm:ss'

    });
</script>
@endpush