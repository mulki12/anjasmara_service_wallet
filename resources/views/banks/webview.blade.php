<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bank') }}
        </h2>
    </x-slot>

    <div class="pt-6"></div>
    @foreach ($banks as $bank)
        <div class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h5 class="card-title">UUID: {{ $bank->uuid }}</h5>
                        <h5 class="card-title">Name: {{ $bank->name_bank }}</h5>
                        <h5 class="card-title">Code: {{ $bank->code_bank }}</h5>
                        <h5 class="card-title">Number: {{ $bank->number_bank }}</h5>
                        <h5 class="card-title">Method: {{ $bank->method_bank }}</h5>
                        <h5 class="card-title">Updated at: {{ $bank->updated_at }}</h5>
                        <h5 class="card-title">Created at: {{ $bank->created_at }}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
