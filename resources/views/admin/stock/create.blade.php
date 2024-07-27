@extends('layouts.app')

@section('template_title')
    {{ __('messages.Create') }} Stock
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @alertSuccesOrDanger()
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.Create') }} Stock</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('stocks.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.stock.form')
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
