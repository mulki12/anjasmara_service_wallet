<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Promotion') }}
        </h2>
    </x-slot>

    <div class="pt-6"></div>
    @foreach ($promos as $promo)
        <div class="pt-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h5 class="card-title">UUID: {{ $promo->uuid }}</h5>
                        <h5 class="card-title">Title: {{ $promo->title_promo }}</h5>
                        <h5 class="card-title">Description: {{ $promo->description_promo }}</h5>
                        <h5 class="card-title">Image: {{ $promo->image_promo }}</h5>
                        <h5 class="card-title">Code: {{ $promo->code_promo }}</h5>
                        <h5 class="card-title">Discount: {{ $promo->discount_promo }}</h5>
                        <h5 class="card-title">Discount Type: {{ $promo->type_discount_promo }}</h5>
                        <h5 class="card-title">Updated at: {{ $promo->updated_at }}</h5>
                        <h5 class="card-title">Created at: {{ $promo->created_at }}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
