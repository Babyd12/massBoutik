@extends('layouts.app')

@section('template_title')
    {{ __('messages.Create') }} {{ __('messages.Unit Per Pack') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @alertSuccesOrDanger

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.Create') }} Unit Per Pack</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('unit-per-packs.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.unit-per-pack.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
