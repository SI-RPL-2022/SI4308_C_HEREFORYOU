@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Consultation Detail</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-3">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</a>
            <a class="nav-link" id="v-pills-review-tab" data-toggle="pill" href="#v-pills-review" role="tab" aria-controls="v-pills-review" aria-selected="false">Review</a>
            <a class="nav-link" id="v-pills-schedule-tab" data-toggle="pill" href="#v-pills-schedule" role="tab" aria-controls="v-pills-schedule" aria-selected="false">Jadwal</a>
            <a href="{{ route('booking.create',$item->id) }}" class="btn btn-sm btn-info btn-block mt-4">Konseling Sekarang</a>
          </div>
        </div>
        <div class="col-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
               <table class="table table-borderless">
                   <tr>
                       <th>Nama</th>
                       <td>
                           {{ $item->name }}
                       </td>
                   </tr>
                    <tr>
                        <th>Spesialis</th>
                        <td>{{ $item->specialist }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $item->email }}</td>
                    </tr>
                    <tr>
                        <th>No. Telepon</th>
                        <td>{{ $item->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $item->address }}</td>
                    </tr>
               </table>
            </div>
            <div class="tab-pane fade" id="v-pills-review" role="tabpanel" aria-labelledby="v-pills-review-tab">
                <p class="mb-4">
                    Nilai : <span class="badge badge-success">
                        {{-- @for ($i = 0; $i < floor($item->score($item->category_id,$item->id)); $i++)
                                    <span class="fas fa-star text-warning"></span>
                                    @endfor --}}
                        {{ $item->rating() }}
                    </span>
                </p>
                <table id="table" class="table table-striped dtable w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Isi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->value }}</td>
                            <td>{{ $review->text }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="v-pills-schedule" role="tabpanel" aria-labelledby="v-pills-schedule-tab">
                <table id="table" class="table table-striped dtable w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Hari</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($item->schedules as $schedule)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $schedule->day }}</td>
                            <td>{{ $schedule->opened_at }}</td>
                            <td>{{ $schedule->closed_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $('.dtable').DataTable({
        "paging": true,
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
        "searching":false,
        "lengthChange":false
    });
  });
</script>
@endpush
