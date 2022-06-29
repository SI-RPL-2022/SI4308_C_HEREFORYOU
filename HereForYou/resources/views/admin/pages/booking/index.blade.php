@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="text-dark">Data Booking</h6>
                    <a href="{{ route('admin.bookings.create') }}" class="btn btn-sm btn-primary">Buat Booking</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th class="text-center">Psikolog</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Paket</th>
                            <th class="text-center">Media</th>
                            <th class="text-center">Topik</th>
                            <th class="text-center">Jadwal</th>
                            <th class="text-center">Durasi (Jam)</th>
                            <th class="text-center">Biaya</th>
                            <th class="text-center">Pembayaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Dibuat</th>
                            <th width="90" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->psychologist->name }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->package }}</td>
                                <td>{{ $item->media }}</td>
                                <td>{{ $item->topic }}</td>
                                <td>{{ $item->time->translatedFormat('l, d F Y H:i:s') }}</td>
                                <td class="text-right">{{ $item->duration }}</td>
                                <td class="text-right">Rp. {{ number_format($item->cost) }}</td>
                                <td>
                                    {{ $item->bank_name . ' - ' . $item->bank_number }}
                                </td>
                                <td>
                                    @if ($item->status === 'SUCCESS')
                                    <span class="badge badge-success">SUCCESS</span>
                                    @elseif($item->status === 'PENDING')
                                    <span class="badge badge-info">PENDING</span>
                                    @else
                                    <span class="badge badge-danger">FAILED</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->translatedFormat('d/m/Y H:i:s') }}</td>
                                <td class="text-center">
                                    @if ($item->status === 'SUCCESS')
                                    <a href="{{ route('admin.bookings.set-status',$item->id) }}?status=PENDING" class="btn btn-sm btn-info"><i class="fas fa-spinner"></i></a>
                                    <a href="{{ route('admin.bookings.set-status',$item->id) }}?status=FAILED" class="btn btn-sm btn-secondary"><i class="fas fa-times"></i></a>
                                    @elseif($item->status === 'PENDING')
                                    <a href="{{ route('admin.bookings.set-status',$item->id) }}?status=SUCCESS" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <a href="{{ route('admin.bookings.set-status',$item->id) }}?status=FAILED" class="btn btn-sm btn-secondary"><i class="fas fa-times"></i></a>
                                    @else
                                    <a href="{{ route('admin.bookings.set-status',$item->id) }}?status=SUCCESS" class="btn btn-sm btn-success"><i class="fas fa-check"></i></a>
                                    <a href="{{ route('admin.bookings.set-status',$item->id) }}?status=PENDING" class="btn btn-sm btn-info"><i class="fas fa-spinner"></i></a>
                                    @endif
                                    <a href="{{ route('admin.bookings.edit',$item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.bookings.destroy', $item->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin?')"><i class="fas fa-trash"></i></button>
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
@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
@endpush
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $('#table').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
    });
  });
</script>
@if (session('success'))
<script>
    toastr.success('{{ session('success') }}.')
</script>
@endif
@endpush
