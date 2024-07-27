@extends('layouts.app')

@section('content')
    <div class="grey-bg container-fluid">
        {{-- <section id="minimal-statistics">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase">Minimal Statistics Cards</h4>
                <p>Statistics on minimal cards.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>278</h3>
                                    <span>New Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-speech warning font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>156</h3>
                                    <span>New Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-graph success font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>64.89 %</h3>
                                    <span>Bounce Rate</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pointer danger font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>423</h3>
                                    <span>Total Visits</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">278</h3>
                                    <span>New Projects</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-rocket danger font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">156</h3>
                                    <span>New Clients</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-user success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">64.89 %</h3>
                                    <span>Conversion Rate</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary">423</h3>
                                    <span>Support Tickets</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-support primary font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary">278</h3>
                                    <span>New Posts</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-book-open primary font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">156</h3>
                                    <span>New Comments</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-bubbles warning font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 35%"
                                    aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">64.89 %</h3>
                                    <span>Bounce Rate</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-cup success font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger">423</h3>
                                    <span>Total Visits</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-direction danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
        <form action="{{ route('dashboard.period', ['period' => $period]) }}" method="get">
            <div class="row padding-1 p-1">
                <div class="col-md-12">
                    <div class="form-group mb-2 mb20">

                        <select name="period" id="period" class="form-control">
                            <option value=""> {{ __('messages.Select') }} {{ __('messages.A_female') }}
                                {{ __('messages.Period') }} </option>
                            <option value="Daily">{{ __('messages.Daily') }}</option>
                            <option value="Weekly">{{ __('messages.Weekly') }}</option>
                            <option value="Monthly">{{ __('messages.Monthly') }}</option>
                            <option value="Yearly">{{ __('messages.Yearly') }}</option>
                        </select>
                        {!! $errors->first('period', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">{{ __('messages.Apply') }}</button>
                </div>
            </div>
        </form>

        <section id="stats-subtitle">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase"> {{ __('messages.Dashboard') }} </h4>
                    <p> {{ __('messages.Statistics') }} </p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body clearfix">
                                <div class="d-flex align-items-end">
                                    <div class="flex-grow-1">
                                        <h4>{{ __('messages.Number of sales') }} {{ __('messages.' . ucfirst($period)) }}
                                        </h4>
                                    </div>
                                    <div class="align-self-end me-3">
                                        <i class="bi bi-bar-chart text-primary fs-1"></i>
                                        {{-- <i class="bi bi-cash-stack text-primary fs-1"></i> --}}
                                    </div>
                                </div>
                                <div class="mt-2 text-end" style="margin-right:5%">
                                    <h1 class="ml-12">{{ $salesCount }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body clearfix">
                                <div class="d-flex align-items-end">
                                    <div class="flex-grow-1">
                                        <h4>{{ __('messages.Sales Amount') }} {{ __('messages.' . ucfirst($period)) }}</h4>
                                    </div>
                                    <div class="align-self-end me-3">
                                        <i class="bi bi-cash-stack text-primary fs-1"></i>
                                    </div>
                                </div>
                                <div class="text-end mt-2 mr-9">
                                    <h1>{{ $salesSum }} {{ App\Enums\CodeDevise::FCFA }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="stats-feature">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase"> {{ __('messages.Finance') }} </h4>
                    <p> {{ __('messages.Forecast') }} </p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body clearfix">
                                <div class="d-flex align-items-end">
                                    <div class="flex-grow-1">
                                        <h4>{{ __('messages.Total Profit Expected for All Products') }}
                                        </h4>
                                    </div>
                                    <div class="align-self-end me-3">
                                        {{-- <i class="bi bi-bar-chart text-primary fs-1"></i> --}}
                                        <i class="bi bi-building-fill-check fs-1"></i>
                                      
                                    </div>
                                </div>
                                <div class="mt-2 text-end" style="margin-right:5%">                                                       
                                    <h1 class="ml-12">{{ $totalProfit }} {{ App\Enums\CodeDevise::FCFA }} </h1>               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-content">
                            <div class="card-body clearfix">
                                <div class="d-flex align-items-end">
                                    <div class="flex-grow-1">
                                        <h4>{{ __('messages.Total net profit per unit sale') }}
                                        </h4>
                                    </div>
                                    <div class="align-self-end me-3">
                                        {{-- <i class="bi bi-bar-chart text-primary fs-1"></i> --}}
                                        <i class="bi bi-building-fill-check fs-1"></i>
                                      
                                    </div>
                                </div>
                                <div class="mt-2 text-end" style="margin-right:5%">                                                       
                                    <h1 class="ml-12">{{ $totalCost }} {{ App\Enums\CodeDevise::FCFA }} </h1>               
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </section>
    </div>
@endsection
