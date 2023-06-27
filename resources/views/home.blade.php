<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Trains</title>
    @vite('resources/js/app.js')

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1 class="title">orario treni del {{ \Carbon\Carbon::now()->format('d-m-Y') }}</h1>

        <div class="item">
            <div class="data-item header">
                <div class="element medium">Azienda</div>
                <div class="element large">Stazione di Partenza</div>
                <div class="element large">Stazione di Arrivo</div>
                <div class="element small">Partenza</div>
                <div class="element small">Arrivo</div>
                <div class="element small">Durata</div>
                <div class="element small">Treno n.</div>
                <div class="element small">Carrozze</div>
                <div class="element small">Ritardo</div>
                <div class="element small">Cancellato</div>
            </div>

            @foreach ($trains as $train)
                <div class="data-item">
                    <div class="element medium">{{ $train->company }}</div>
                    <div class="element large">{{ $train->departure_station }}</div>
                    <div class="element large">{{ $train->arrival_station }}</div>
                    <div class="element small">{{ \Carbon\Carbon::parse($train->departure_time)->format('H:i') }}</div>
                    <div class="element small">{{ \Carbon\Carbon::parse($train->arrival_time)->format('H:i') }}</div>
                    <div class="element small">{{ \Carbon\Carbon::parse($train->duration)->format('H:i') }}</div>
                    <div class="element small">{{ $train->train_code }}</div>
                    <div class="element small">{{ $train->carriages_number }}</div>
                    <div class="element small">{{ $train->delay }}</div>
                    <div class="element small">{{ $train->cancelled ? 'Sì' : 'No' }}</div>
                </div>
            @endforeach

        </div>

</body>

</html>
