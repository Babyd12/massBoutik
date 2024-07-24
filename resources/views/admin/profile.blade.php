@extends('layouts.app')

@section('content')
   

        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @alertSuccesOrDanger
                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('messages.Profile') }} </span>
                        </div>
                        <div class="card-body bg-white">
                            <form method="POST" action="{{ route('dashboard.updateProfile') }}"  role="form" enctype="multipart/form-data">
                                @csrf
    
                                @include('admin.profile_form')
    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

  
@endsection