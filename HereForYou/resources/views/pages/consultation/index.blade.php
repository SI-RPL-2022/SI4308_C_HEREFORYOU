@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center">Consultation</h4>
        </div>
    </div>
    <div class="row">
       @foreach ($psychologists as $psychologist)
       <div class="col-md-3">
            <div class="card">
                <img src="{{ $psychologist->photo() }}" class="card-img-top" alt="..." style="height: 200px; width: auto">
                <div class="card-body">
                    <h5 class="card-title">{{ $psychologist->name }}</h5>
                    <p class="card-text">
                        Spesialis : {{ $psychologist->specialist }}
                    </p>
                    <p class="card-text">
                        <div class="small">
                            @for ($i = 0; $i < floor($psychologist->rating()); $i++)
                            <span class="fas fa-star text-warning"></span>
                            @endfor
                            @php
                               $starInActive = 5 - floor($psychologist->rating())
                            @endphp
                            @for ($j = 0; $j < $starInActive; $j++)
                            <span class="fas fa-star"></span>
                            @endfor
                            <span>({{ $psychologist->reviews()->count() }})</span>
                        </div>
                        
                    </p>
                    <a href="{{ route('consultations.show',$psychologist->id) }}" class="btn btn-info btn-sm px-3 float-right">Detail</a>
                </div>
            </div>
        </div>
       @endforeach
    </div>
</div>
@endsection