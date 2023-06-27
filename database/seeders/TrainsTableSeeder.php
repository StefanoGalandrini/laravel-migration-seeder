<?php

namespace Database\Seeders;

use App\Models\Train;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('it_IT');
        $companies = ["Trenitalia", "Italo"];

        for ($i = 0; $i < 20; $i++) { // Genera 20 treni
            $departure_time = $faker->time($format = 'H:i');
            $duration = $faker->time($format = 'H:i');

            $departure_time_carbon = \Carbon\Carbon::createFromFormat('H:i', $departure_time);

            // Calcola una durata del viaggio compresa tra 1h e 5:30h
            $hours = rand(1, 5);
            $minutes = $hours == 5 ? rand(0, 30) : rand(0, 59);
            $duration = \Carbon\Carbon::createFromTime($hours, $minutes)->format('H:i');


            $duration_carbon = Carbon::createFromFormat('H:i', $duration);

            // Calcola l'orario di arrivo
            $arrival_time = $departure_time_carbon->copy()->addHours($duration_carbon->format('H'))->addMinutes($duration_carbon->format('i'))->format('H:i');

            Train::create([
                'company' => $faker->randomElement($companies),
                'departure_station' => $faker->city,
                'arrival_station' => $faker->city,
                'departure_time' => $departure_time,
                'arrival_time' => $arrival_time,
                'duration' => $duration,
                'train_code' => $faker->randomNumber(4, true),
                'carriages_number' => $faker->numberBetween(5, 20),
                'delay' => $faker->numberBetween(0, 60),
                'cancelled' => $faker->boolean,
            ]);
        }
    }
}
