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

                            <span id="card_title">
                                {{ __('messages.Stocks') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('messages.Add stock') }}
                                </a>
                                <a href="{{ route('stocks.sell') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
                                        <th >{{__('messages.Operation')}}</th>
									<th >{{__('messages.Quantity')}}</th>
									<th >{{__('messages.Product')}}</th>
									<th >{{__('messages.Sell price')}}</th>
									<th >{{__('messages.created_at')}}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                                
                                            <td >{{ __('messages.'.$stock->operation) }}</td>
                                            <td >{{ $stock->quantity }}</td>
                                            <td >{{ $stock->product->name }}</td>
                                            <td >{{ $stock->product->selling_price }}</td>
                                            <td >{{ $stock->created_at }}</td>
                                            <td>
                                                <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('stocks.show', $stock->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('messages.Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('stocks.edit', $stock->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('messages.Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('messages.Delete') }}</button>
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
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
    </script>
@endsection
