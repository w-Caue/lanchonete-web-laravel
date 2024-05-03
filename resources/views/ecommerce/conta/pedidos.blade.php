@extends('layouts.ecommerce-main')

@section('content')
<div class="grid grid-cols-4 items-start gap-2 my-44 mx-5">

    <div class="w-full col-span-1 rounded-md shadow-md border">
        @include('layouts.ecommerce.account.ecommerce-menu')
    </div>

    <div class="w-full col-span-3">
        @livewire('Ecommerce.Conta.Pedidos')
    </div>
</div>

@endsection