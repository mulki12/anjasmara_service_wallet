@extends('layouts.main')
{{-- @dd($promos) --}}
@section('container')
    <div class="row">
        @foreach ($promos as $promo)
        <div class="col-md-4 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h2>{{ $promo->title_promo }}</h2>
                    <h5 class="card-title">{{ $promo->description_promo }}</h5>
                    <a href="/api/promos" class="btn btn-primary mt-2 mb-2">to promo</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection