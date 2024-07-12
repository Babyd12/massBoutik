@extends('layouts.app')

@section('template_title')
    {{ $unitPerPack->name ?? __('Show') . " " . __('Unit Per Pack') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Unit Per Pack</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('unit-per-packs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Title:</strong>
                                    {{ $unitPerPack->title }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Number:</strong>
                                    {{ $unitPerPack->number }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
