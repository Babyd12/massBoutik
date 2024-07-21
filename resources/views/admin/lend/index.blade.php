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
                                {{ __('Lends') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('lends.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
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
                                        <th>Quantity</th>
                                        <th>State</th>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Date du pret</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productLends as $productLend)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $productLend->lend->quantity }}</td>
                                            <td>{{ $productLend->lend->state ? 'Active' : 'Inactive' }}</td>
                                            <td>{{ $productLend->user->full_name }}</td>
                                            <td>{{ $productLend->product->name }}</td>
                                            <td>{{ $productLend->created_at }}</td>
                                            <td>
                                                <form action="{{ route('lends.destroy', $productLend->id) }}"method="POST">
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ route('lends.show', $productLend->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('lends.edit', $productLend->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
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
