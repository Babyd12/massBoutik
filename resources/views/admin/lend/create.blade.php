@extends('layouts.app')

    
@section('css')  
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet"> 
@endsection

@section('template_title')
    {{ __('Create') }} Lend
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                @alertSuccesOrDanger
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} {{__('messges.Lend')}}</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('lends.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.lend.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/select2.js') }}"></script>
    
    
@endsection
