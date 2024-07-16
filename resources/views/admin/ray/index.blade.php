@extends('layouts.app')

@section('template_title')
    {{__('meesages.Rays')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('meesages.Rays') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('rays.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('messages.Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >{{__('messages.Name')}}</th>
									<th >{{__('messages.Position')}}</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rays as $ray)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $ray->name }}</td>
										<td >{{ $ray->position }}</td>

                                            <td>
                                                <form action="{{ route('rays.destroy', $ray->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('rays.show', $ray->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('messages.Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('rays.edit', $ray->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('messages.Edit') }}</a>
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
                {!! $rays->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
