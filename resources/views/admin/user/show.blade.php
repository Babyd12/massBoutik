@extends('layouts.app')

@section('template_title')
    {{ $user->name ?? __('messages.Show') . " " . __('messages.User') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('messages.Show') }} User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('users.index') }}"> {{ __('messages.Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__("messages.Full Name")}}:</strong>
                                    {{ $user->full_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__("messages.Nick Name")}}:</strong>
                                    {{ $user->nick_name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.Description')}}:</strong>
                                    {{ $user->description }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.Picture')}}:</strong>
                                    {{ $user->picture }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.Email')}}:</strong>
                                    {{ $user->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.Role')}}:</strong>
                                    {{ $user->role }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>{{__('messages.Phone')}}:</strong>
                                    {{ $user->phone_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
