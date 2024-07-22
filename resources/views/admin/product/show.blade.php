@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? __('messages.Show') . " " . __('messages.Product') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('messages.Show') }}  {{__('messages.Product')}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"> {{ __('messages.Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $product->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.PurchasePrice')}}:</strong>
                                    {{ $product->purshacePrice }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.Sellingprice')}}:</strong>
                                    {{ $product->sellingPrice }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.State')}}:</strong>
                                    {{ $product->state }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.Unit Per Pack Id')}}:</strong>
                                    {{ $product->unitPerPack->title }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
