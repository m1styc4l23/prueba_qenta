@extends('structure')   

@section('content')
    <div class='container'>
        <div class='row justify-content-center'>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Actualizar Jugador
                            <a href="{{ route('players') }}" class="btn btn-outline-danger btn-sm float-right">Volver</a>
                        </h4>
                    </div>
                    
                    <div class="card-body">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                        @foreach ($playersArray as $player)
                        <form action="{{ route('players.update', $player['id']) }}" method="POST">
                            @csrf 
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-1 mb-1">
                                    <label for="inputIdPlayer" class="col-form-label"> ID * </label>
                                    <input type="number" name="id_player" class="form-control" placeholder="ID" readonly value="{{ $player['id'] }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-1">
                                    <label for="inputFirstName" class="col-form-label"> Nombre * </label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Nombre" value="{{ $player['first_name'] }}">
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="inputLastName" class="col-form-label"> Apellido * </label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Apellido" value="{{ $player['last_name'] }}">
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="inputPosition" class="col-form-label"> Posición </label>
                                    <input type="text" name="position" class="form-control" placeholder="Posición" value="{{ $player['position'] }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-1">
                                    <label for="inputHeightFeet" class="col-form-label"> Altura en Pies </label>
                                    <input type="number" name="height_feet" class="form-control" placeholder="Altura en Pies" value="{{ $player['height_feet'] }}">
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="inputHeightInches" class="col-form-label"> Altura en Pulgadas </label>
                                    <input type="number" name="height_inches" class="form-control" placeholder="Altura en Pulgadas" value="{{ $player['height_inches'] }}">
                                </div>
                                <div class="col-md-4 mb-1">
                                    <label for="inputWeightPounds" class="col-form-label"> Peso en Libras </label>
                                    <input type="number" name="weight_pounds" class="form-control" placeholder="Peso en Libras" value="{{ $player['weight_pounds'] }}">
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header text-center">
                                    Información Equipo
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-1">
                                            <label for="inputIdTeam" class="col-form-label"> ID * </label>
                                            <input type="number" name="id_team" class="form-control" placeholder="ID" value="{{ $player['team']['id'] }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-1">
                                            <label for="inputFullName" class="col-form-label"> Nombre Completo * </label>
                                            <input type="text" name="full_name" class="form-control" placeholder="Nombre Completo" value="{{ $player['team']['full_name'] }}">
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label for="inputName" class="col-form-label"> Nombre * </label>
                                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ $player['team']['name'] }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-1">
                                            <label for="inputAbbreviation" class="col-form-label"> Abreviación * </label>
                                            <input type="text" name="abbreviation" class="form-control" placeholder="Abreviación" value="{{ $player['team']['abbreviation'] }}">
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label for="inputCity" class="col-form-label"> Ciudad * </label>
                                            <input type="text" name="city" class="form-control" placeholder="Ciudad" value="{{ $player['team']['city'] }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-1">
                                            <label for="inputConference" class="col-form-label"> Conferencia * </label>
                                            <input type="text" name="conference" class="form-control" placeholder="Conferencia" value="{{ $player['team']['conference'] }}">
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label for="inputDivision" class="col-form-label"> Divición * </label>
                                            <input type="text" name="division" class="form-control" placeholder="Divición" value="{{ $player['team']['division'] }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col text-center">
                                <input 
                                    type="submit" 
                                    value="Actualizar" 
                                    class="btn btn-block btn-md btn-outline-success btn-xs"
                                    onclick="return confirm('¿Desea Actualizar... ?')">
                            </div>
                        </form>
                        @endforeach
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection