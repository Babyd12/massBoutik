@extends('layouts.app')

@section('template_title')
    Lends
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('messages.List of Borrowers') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('lends.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('messages.Register a loan') }}
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
                            <table id="data-table" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>{{__('messages.Picture')}}</th>
                                        <th>{{__('messages.User')}}</th>
                                        <th>{{__('messages.Quantity')}}</th>
                                        <th>{{__('messages.Product')}}</th>
                                        <th>{{__('messages.State')}}</th>
                                        <th>{{__('messages.Date of lend')}}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productLends as $productLend)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            @dump( $productLend->user->image)
                                            <td> <img src="{{ $productLend->user->image }}"class="img-fluid rounded-top"alt="user" width="30" height="30"/> </td>
                                            <td>{{ $productLend->user->full_name }}</td>
                                            <td>{{ $productLend->lend->quantity }}</td>
                                            <td>{{ $productLend->product->name }}</td>
                                            <td>{{ $productLend->lend->state ? 'Impayé' : 'Payé' }}</td>
                                            <td>{{ $productLend->created_at }}</td>
                                            <td>
                                                <form action="{{ route('lends.destroy', $productLend->id) }}"method="POST">
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('lends.show', $productLend->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('messages.Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('lends.edit', $productLend->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('messages.Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('messages.Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productLends->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
