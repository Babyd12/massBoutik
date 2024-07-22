@extends('layouts.app')

@section('template_title')
    {{ $lend->name ?? __('Show') . " " . __('Lend') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Lend</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('lends.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Quantity:</strong>
                                    {{ $lend->quantity }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Date:</strong>
                                    {{ $lend->date }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>State:</strong>
                                    {{ $lend->state }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Service Id:</strong>
                                    {{ $lend->service_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $lend->user_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
