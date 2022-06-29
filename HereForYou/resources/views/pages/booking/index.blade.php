@extends('layouts.app')
@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-text text-center">Histori</h5>
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th width="10" class="text-center">#</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Psikolog</th>
                                <th class="text-center">Paket</th>
                                <th class="text-center">Media</th>
                                <th class="text-center">Topik</th>
                                <th class="text-center">Jadwal</th>
                                <th class="text-center">Durasi (Jam)</th>
                                <th class="text-center">Biaya</th>
                                <th class="text-center">Pembayaran</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Dibuat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>{{ $item->psychologist->name }}</td>
                                    <td>{{ $item->package }}</td>
                                    <td>{{ $item->media }}</td>
                                    <td>{{ $item->topic }}</td>
                                    <td>{{ $item->time->translatedFormat('d/m/Y H:i:s') }}</td>
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
                                    <td>{{ $item->created_at->translatedFormat('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('invoice',$item->id) }}" class="btn btn-secondary btn-sm" target="_blank">Invoice</a>
                                        @if ($item->status === 'SUCCESS')
                                        <Button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalRating" data-id="{{ $item->id }}" data-psychologist_id="{{ $item->psychologist_id }}" id="btnRating">Beri Rating</Button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalRating" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Beri Rating</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('consultation.rating') }}" method="post">
        <div class="modal-body">
              @csrf
              <input type="text" hidden name="psychologist_id" id="psychologist_id">
              <input type="text" hidden name="id" id="id">
                @for ($i = 1;$i <= 5; $i++)
                <div class="custom-control custom-radio">
                    <input type="radio" name="score" value="<?= $i; ?>" class="custom-control-input" id="defaultUnchecked<?= $i; ?>" required="required">
                    <label for="defaultUnchecked<?= $i; ?>" class="custom-control-label">
                        <?php for ($j = 0;$j < $i; $j++): ?>
                        <span class="fas fa-star text-warning"></span>
                        <?php endfor ?>
                    </label>
                </div>
                @endfor
                <div class="form-group">
                    <label for="text">Pesan</label>
                    <textarea name="text" id="text" cols="30" rows="3" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
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
        "ordering": false,
        "info": false,
        "autoWidth": true,
        "responsive": true,
        "searching":false
    });

    $('body').on('click', '#btnRating', function(){
        var id = $(this).data('id');
        var psychologist_id = $(this).data('psychologist_id');
        $('#id').val(id);
        $('#psychologist_id').val(psychologist_id);
    })
  });
</script>
@if (session('success'))
<script>
    toastr.success('{{ session('success') }}.')
</script>
@endif
@if (session('error'))
<script>
    toastr.error('{{ session('error') }}.')
</script>
@endif
@endpush
