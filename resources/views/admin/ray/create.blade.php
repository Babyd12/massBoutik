@extends('layouts.app')

@section('template_title')
    {{ __('messages.Create') }} Ray
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.Create') }} Ray</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('rays.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.ray.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
