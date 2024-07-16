@extends('layouts.app')

@section('template_title')
    {{ __('messages.Create') }} Product
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.Create') }} Product</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('products.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.product.form')
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
