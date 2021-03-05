@extends('structure')   

@section('content')
    <div class='container'>
        <div class='row justify-content-center'>
            @foreach ($playersArray as $player)
            <div class="card" style="width: 18rem">
                <img
                    src="https://www.w3schools.com/bootstrap4/img_avatar3.png"
                    class="card-img-top"
                />
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $player['id'] }} - {{ $player['first_name'] }} {{ $player['last_name'] }}</h5>
                    <p class="card-text">
                        Su posición es: {{ $player['position'] }}, Peso en Libras: {{ $player['weight_pounds'] }}, Altura en Pies: {{ $player['height_feet'] }}, Altura en Pulgadas: {{ $player['height_inches'] }}
                    </p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center"><b>Equipo</b></li>
                    <li class="list-group-item">{{ $player['team']['id'] }} - {{ $player['team']['full_name'] }}</li>
                    <li class="list-group-item">Abreviación: {{ $player['team']['abbreviation'] }}</li>
                    <li class="list-group-item">Ciudad: {{ $player['team']['city'] }}</li>
                    <li class="list-group-item">Conferencia: {{ $player['team']['conference'] }}</li>
                    <li class="list-group-item">Divición: {{ $player['team']['division'] }}</li>
                </ul>
                <div class="card-body">
                <a href="{{ route('players') }}" class="btn btn-outline-danger btn-sm">Volver</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection