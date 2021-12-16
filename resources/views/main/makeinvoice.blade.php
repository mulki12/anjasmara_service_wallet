@extends('layouts.main')

{{-- @foreach ($wallet as $u)
    @dd($u)
@endforeach --}}
{{-- @dd($user_wallet) --}}
@section('container')
        
    <div class="row">
        <div class="col-md-6">
            <form action="makePayout" method="POST">
                @csrf
                <h2 class="text-center mb-3"></h2>
                <label for="external_id">external_id</label>
                <input type="text" class="form-control mb-3" name="exid" id="external_id" value="">
                <label for="amount">Amount</label>
                <input type="text" class="form-control mb-3" name="amount" id="amount">
                <label for="email">Email</label>
                <input type="text" class="form-control mb-3" name="email" id="email">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2 class="mb-3"></h2>
            <p>Saldo: </p>
        </div>
    </div>
    
    @endsection