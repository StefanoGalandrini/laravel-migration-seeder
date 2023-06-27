<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/js/app.js')

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">orario treni del {{ \Carbon\Carbon::now()->format('d-m-Y') }}</h1>

        <div class="row header">
            <div class="element">Azienda</div>
            <div class="element">Stazione di Partenza</div>
            <div class="element">Stazione di Arrivo</div>
            <div class="element">Orario di Partenza</div>
            <div class="element">Orario di Arrivo</div>
            <div class="element">Durata</div>
            <div class="element">Codice Treno</div>
            <div class="element">Numero Carrozze</div>
            <div class="element">In Orario</div>
            <div class="element">Cancellato</div>
        </div>

        @foreach ($trains as $train)
            <div class="row">
                <div class="element">{{ $train->company }}</div>
                <div class="element">{{ $train->departure_station }}</div>
                <div class="element">{{ $train->arrival_station }}</div>
                <div class="element">{{ $train->departure_time }}</div>
                <div class="element">{{ $train->arrival_time }}</div>
                <div class="element">{{ $train->duration }}</div>
                <div class="element">{{ $train->train_code }}</div>
                <div class="element">{{ $train->carriages_number }}</div>
                <div class="element">{{ $train->delay }}</div>
                <div class="element">{{ $train->cancelled ? 'Sì' : 'No' }}</div>
            </div>
        @endforeach

    </div>

</body>

</html>
