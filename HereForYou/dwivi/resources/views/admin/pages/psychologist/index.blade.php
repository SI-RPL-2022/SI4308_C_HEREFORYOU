@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h6 class="text-dark">Data Psikolog</h6>
                    <a href="{{ route('admin.psychologists.create') }}" class="btn btn-sm btn-primary">Tambah Psikolog</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th width="10" class="text-center">#</th>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Spesialis</th>
                            <th class="text-center">Tarif (Jam)</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">No. Telepon</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Status</th>
                            <th width="90" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ $item->photo() }}" alt="" class="img-fluid" style="max-height: 80px;max-width: 80px">
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->specialist }}</td>
                                <td>Rp. {{ number_format($item->price_hourly) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>{{ $item->address }}</td>
                                <td>
                                    @if ($item->status == 1)
                                    <div class="badge badge-success">Aktif</div>
                                    @else 
                                    <div class="badge badge-danger">Tidak Aktif</div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.psychologists.show', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('admin.psychologists.edit', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.psychologists.destroy', $item->id) }}" class="d-inline" method="post">
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