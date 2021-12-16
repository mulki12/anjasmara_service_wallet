@extends('layouts.main')
{{-- @dd($datas) --}}
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
            <h2>Make virtual account</h2>
            <form action="/api/xendit/va/createVa">
                @csrf
                <input type="hidden" name="uuid" value="{{ $wallet->uuid }}">
                <label for="name">Name</label>
                <input type="text" name="bank_code" class="form-control mb-3">
                <label for="bank">Bank</label>
                <input type="text" name="bank_code" class="form-control mb-3">
                <button type="submit" class="btn btn-primary mb-3">Create Virtual account</button>
            </form>
            <a href="/api/xendit/va/list" class="btn btn-primary">To xendit payment list</a>
        </div>
    </div>
@endsection