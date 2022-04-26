@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-4">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{ $item->photo() }}"
                   alt="Foto {{ $item->name }}">
            </div>

            <h3 class="profile-username text-center">{{ $item->name }}</h3>

            <p class="text-muted text-center">{{ $item->specialist }}</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Nama</b> <a class="float-right text-dark small">{{ $item->name }}</a>
              </li>
              <li class="list-group-item">
                <b>Spesialis</b> <a class="float-right text-dark small">{{ $item->specialist }}</a>
              </li>
              <li class="list-group-item">
                <b>Alamat</b> <a class="float-right text-dark small">{{ $item->address }}</a>
              </li>
              <li class="list-group-item">
                <b>No. Telepon</b> <a class="float-right text-dark small">{{ $item->phone_number }}</a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right text-dark small">{{ $item->email }}</a>
              </li>
              <li class="list-group-item">
                <b>Tarif (Jam)</b> <a class="float-right text-dark small">Rp. {{ number_format($item->price_hourly) }}</a>
              </li>
              <li class="list-group-item">
                <b>Bergabung pada </b></b> <a class="float-right small text-dark">{{ $item->created_at->translatedFormat('l, d F Y') }}</a>
              </li>
              <li class="list-group-item">
                <b>Terakhir Diperbaharui pada</b> <a class="float-right small text-dark">{{ $item->updated_at->translatedFormat('l, d F Y') }}</a>
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
                <h6 class="text-center">Jadwal Aktif</h6>
            </div>
            <div class="card-body">
                <a href="{{ route('admin.schedules.create',$item->id) }}" class="my-2 btn btn-sm btn-primary">Tambah Jadwal</a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width=10>#</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam Buka</th>
                                <th class="text-center">Jam Tutup</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($item->schedules as $schedule)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $schedule->day }}</td>
                                <td>{{ $schedule->opened_at }}</td>
                                <td>{{ $schedule->closed_at }}</td>
                                <td>
                                    <a href="{{ route('admin.schedules.edit',[$item->id,$schedule->id]) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.schedules.destroy',$schedule->id) }}" class="d-inline" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah yakin?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert">
                                        <p class="text-center">Tidak Ada Jadwal</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h6 class="text-center">Review User</h6>
            </div>
            <div class="card-body">
                <div class="my-2">
                    <h6>Nilai : <span class="badge badge-success">{{ $item->rating() }}</span></h6>
                </div>
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th width=10>#</th>
                            <th class="text-center">Nama User</th>
                            <th class="text-center">Nilai</th>
                            <th class="text-center">Isi</th>
                            <th class="text-center">Tanggl</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->value }}</td>
                            <td>{{ $review->text }}</td>
                            <td>{{ $item->created_at->translatedFormat('l, d F Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        "ordering": false,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "searching": false
    });
  });
</script>
@if (session('success'))
<script>
    toastr.success('{{ session('success') }}.')
</script>
@endif
@endpush