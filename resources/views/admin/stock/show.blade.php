@extends('layouts.app')

@section('template_title')
    {{ $stock->name ?? __('messages.Show') . ' ' . __('messages.Stock') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('messages.Show') }} Stock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('stocks.index') }}"> {{ __('messages.Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Quantity:</strong>
                            {{ $stock->quantity }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('messages.Operation') }}:</strong>
                            {{ $stock->operation }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('messages.Price') }}:</strong>
                            {{ $stock->price }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('messages.Product') }}:</strong>
                            {{ $stock->product_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
