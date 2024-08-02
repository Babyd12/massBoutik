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
                                    {{ __('messages.Add stock') }}
                                </a>
                                <a href="{{ route('stocks.sell') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('messages.Create Sell') }}
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
