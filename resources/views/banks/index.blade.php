@extends('layouts.main')
{{-- @dd($banks) --}}
@section('container')
    <div class="row">
        @foreach ($banks as $bank)
        <div class="col-md-4 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h2>{{ $bank->name_bank }}</h2>
                    <h5 class="card-title">Metode Bank: {{ $bank->method_bank }}</h5>
                    {{-- <h5 class="card-title">Poin: {{ $wallet->poin_wallet }}</h5> --}}
                    <a href="/api/wallet" class="btn btn-primary">to wallet</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection