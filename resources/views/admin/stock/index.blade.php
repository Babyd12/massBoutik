@extends('layouts.app')

@section('template_title')
    Stocks
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h1 id="card_title">
                                {{ __('messages.Buys and sells') }}
                            </h1>

                            <div class="float-right">
                                <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('messages.Make Purchase | Sale') }}
                                </a>
                                <a href="{{ route('pdf.sale') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803q.43 0 .732-.173.305-.175.463-.474a1.4 1.4 0 0 0 .161-.677q0-.375-.158-.677a1.2 1.2 0 0 0-.46-.477q-.3-.18-.732-.179m.545 1.333a.8.8 0 0 1-.085.38.57.57 0 0 1-.238.241.8.8 0 0 1-.375.082H.788V12.48h.66q.327 0 .512.181.185.183.185.522m1.217-1.333v3.999h1.46q.602 0 .998-.237a1.45 1.45 0 0 0 .595-.689q.196-.45.196-1.084 0-.63-.196-1.075a1.43 1.43 0 0 0-.589-.68q-.396-.234-1.005-.234zm.791.645h.563q.371 0 .609.152a.9.9 0 0 1 .354.454q.118.302.118.753a2.3 2.3 0 0 1-.068.592 1.1 1.1 0 0 1-.196.422.8.8 0 0 1-.334.252 1.3 1.3 0 0 1-.483.082h-.563zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638z"/>
                                      </svg>
                                    {{ __('messages.Export sell as pdf') }}
                                </a>
                            </div>
                            
                                
                           
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table id ="data-table" class="table table-striped " style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>{{ __('messages.Quantity') }}</th>
                                        <th>{{ __('messages.Operation') }}</th>
                                        <th>{{ __('messages.Operation type') }}</th>
                                        <th>{{ __('messages.Price') }}</th>
                                        <th>{{ __('messages.Product') }}</th>
                                        <th>{{ __('messages.created_at') }}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $stock->quantity }}</td>
                                            <td>{{ __('messages.' . $stock->operation) }}</td>
                                            <td>{{ __('messages.' . $stock->operation_type) }}</td>
                                            <td>{{ $stock->price }}</td>
                                            <td>{{ $stock->product->name }}</td>
                                            <td>{{ $stock->created_at }}</td>
                                            <td>
                                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('stocks.show', $stock->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('messages.Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('stocks.edit', $stock->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('messages.Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i>
                                                        {{ __('messages.Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $stocks->withQueryString()->links() !!}
            </div>
        </div>
    </div>

    {{-- CURRENT STOCKS BY PRODUCTS --}}
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h1 id="card_title">
                                {{ __('messages.Current stock') }}
                            </h1>
                        </div>
                    </div>


                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table id="data-table-1" class="table table-striped" style="width:100%">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>{{ __('messages.Product') }}</th>
                                        <th>{{ __('messages.Quantity') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productWithStocks as $productStock)
                                        <tr>
                                            <td>{{ ++$j}}</td>
                                            <td>{{ $productStock->name }}</td>
                                            <td>{{ $productStock->currentStock }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $stocks->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#data-table-1').DataTable();
        });
    </script>
@endsection
