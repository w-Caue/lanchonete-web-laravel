@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex flex-row gap-3">
                
                <a href="{{ route('site.pedido.index') }}" class="row p-3 w-50 g-0 border rounded nav-link d-flex align-items-center">
                    <div class="col-md-4 p-2">
                        <i class="bi bi-basket2 fs-1 border rounded-circle p-3 text-body-tertiary"></i>
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Pedido</h5>
                        <p class="card-text">Crie Seu Pedido</p>
                    </div>
                    </div>
                </a>
             
            </div>
        </div>
    </div>
</div>
@endsection
