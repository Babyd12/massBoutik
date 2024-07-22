@extends('layouts.app')

@section('template_title')
    {{ __('messages.Update') }} {{__('messages.Lend')}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.Update') }} Lend</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('lends.update', $lend->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.lend.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
