@extends('layouts.app')

@section('template_title')
    {{__('messages.Unit Per Packs')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('messages.Unit Per Packs') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('unit-per-packs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
									<th >{{__('messages.Title')}}</th>
									<th >{{__('messages.Number')}}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unitPerPacks as $unitPerPack)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $unitPerPack->title }}</td>
										<td >{{ $unitPerPack->number }}</td>

                                            <td>
                                                <form action="{{ route('unit-per-packs.destroy', $unitPerPack->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('unit-per-packs.show', $unitPerPack->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('messages.Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('unit-per-packs.edit', $unitPerPack->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('messages.Edit') }}</a>
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
                {!! $unitPerPacks->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
