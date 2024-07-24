@extends('layouts.app')

@section('template_title')
    {{ __('messages.Update') }} User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                @alertSuccesOrDanger
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('messages.Update') }} User</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
