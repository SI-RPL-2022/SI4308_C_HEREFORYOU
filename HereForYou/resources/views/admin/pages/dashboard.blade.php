@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $count['booking'] }}</h3>

            <p>Booking</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('admin.bookings.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $count['psychologist'] }}</h3>

            <p>Psikolog</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route('admin.psychologists.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $count['user'] }}</h3>

            <p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('admin.users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5>Booking Terbaru</h5>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="10" class="text-center">#</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Psikolog</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Durasi (Jam)</th>
                        <th class="text-center">Biaya</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Dibuat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking_latest as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->psychologist->name }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td class="text-right">{{ $item->duration }}</td>
                            <td class="text-right">Rp. {{ number_format($item->cost) }}</td>
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
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@push('scripts')
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>

@endpush