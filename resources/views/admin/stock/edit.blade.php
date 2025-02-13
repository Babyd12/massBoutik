@extends('layouts.app')

@section('template_title')
    {{ __('messages.Update') }} Stock
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                    @alertSuccesOrDanger()

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.Update') }} Stock</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('stocks.update', $stock->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.stock.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
