@extends('layouts.app')

@section('template_title')
    {{ $productLend->name ?? __('Show') . " " . __('Product Lend') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Lend</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('product-lends.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Product Id:</strong>
                                    {{ $productLend->product_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lend Id:</strong>
                                    {{ $productLend->lend_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $productLend->user_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
