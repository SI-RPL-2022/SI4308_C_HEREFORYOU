@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-3 justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-center">Notifikasi</h4>
                        @foreach ($items as $item)
                            <div class="notif @if($item->status == 0) bg-notif @endif py-3 px-2" data-id="{{ $item->id }}">
                                <div class="small text-muted font-weight-bold">{{ $item->created_at->translatedFormat('l, d F Y') }}</div>
                                <h6 class="m-0 p-0">{{ $item->title }}</h6>
                                <p class="small">{{ $item->description }}</p>
                            </div>
                            <hr>
                        @endforeach

                       <div class="d-flex justify-content-center">
                        {{ $items->links() }}
                       </div>
                        <form action="{{ route('notifications.update') }}" method="post" id="formUpdate">
                            @csrf
                            <input type="number" name="id" hidden id="id">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
<style>
    .bg-notif{
        background:rgba(0,0,0,.04);
        border-radius: 10px;
    }
    .notif:hover{
        cursor: pointer;
    }
</style>
@endpush
@push('scripts')
<script>
    $(function(){
        $('body').on('click','.notif', function(){
            var notif_id = $(this).data('id');
            $('#id').val(notif_id);
            $('#formUpdate').submit();
            // ajax update status notifikasi
        })
    })
</script>
@endpush
