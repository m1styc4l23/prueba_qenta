
@extends('structure')   

@section('content')
    <div class='container'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="page-header">
                    <h1>
                        Listado de Jugadores
                        <div class="float-right">
                        {{ Form::open(['route' => 'players', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                            {{ Form::token() }}
                            <div class="form-group">
                                {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' =>'Nombre'])}}
                            </div>
                            <div class="form-group">
                                {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' =>'Apellido'])}}
                            </div>
                            <div class="form-group">
                                {{ Form::text('position', null, ['class' => 'form-control', 'placeholder' =>'Posición']) }}
                            </div>
                            <div class="form-group">
                                <button type='submit' class="btn btn-default">
                                    <i class="bi bi-search" style="font-size: 1.5rem;"></i>
                                </button>
                            </div>
                        {{ Form::close() }}
                        </div>
                    </h1>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class='table table-hover table-striped'>
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Posición</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @if(!empty($playersArray))
                                @foreach ($playersArray as $player)
                                    <tr>
                                        <td>{{ $player['id'] }}</td>
                                        <td>{{ $player['first_name'] }}</td>
                                        <td>{{ $player['last_name'] }}</td>
                                        <td>{{ $player['position'] }}</td>
                                        <td><a href="{{ route('players.show', $player['id'] ) }}" class="btn btn-outline-secondary btn-sm">Ver</a></td>
                                        <td><a href="{{ route('players.edit', $player['id'] ) }}" class="btn btn-outline-warning btn-sm">Editar</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"class="text-center">No hay datos - error con el api</td>
                                </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection