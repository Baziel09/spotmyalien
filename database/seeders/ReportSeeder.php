<?php

namespace Database\Seeders;

use App\Enums\ReportType;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure users exist
        if (User::count() === 0) {
            $this->call(UserSeeder::class);
        }

        $userIds = User::pluck('id')->toArray();
        $reportTypes = ReportType::cases();
        $countries = ['United States', 'Canada', 'United Kingdom', 'Australia', 'Germany', 'France'];
        $usCities = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix'];
        $ukCities = ['London', 'Manchester', 'Birmingham', 'Liverpool'];
        $canadaCities = ['Toronto', 'Vancouver', 'Montreal', 'Calgary'];
        
        $streetNames = [
            'Main Street', 'Oak Avenue', 'Maple Road', 'Elm Street', 'Pine Lane',
            'Cedar Boulevard', 'Washington Street', 'Park Avenue', 'Lake View'
        ];

        $descriptions = [
            'Saw a bright circular object hovering silently for about 5 minutes before shooting straight up.',
            'Multiple orange lights in triangular formation moving slowly across the sky.',
            'Disk-shaped craft with blinking lights made sudden 90-degree turn impossible for aircraft.',
            'Large metallic object descended into woods but search party found nothing.',
            'Pulsating red and blue lights in the sky that disappeared instantaneously.',
            'Witnessed a saucer-shaped craft with a dome on top moving erratically.',
            'Bright light followed my car for several miles before vanishing.',
            'Strange humming sound accompanied a hovering object with green lights.',
            'Cluster of white orbs performing synchronized maneuvers at high speed.',
            'Cigar-shaped object with no wings or visible propulsion system.',
            'Low-flying triangular craft with lights at each corner completely silent.',
            'Object appeared to land in nearby field but disappeared upon investigation.',
            'Multiple witnesses saw a glowing sphere split into two separate objects.',
            'Unusual lights forming geometric patterns in the night sky.',
            'Fast-moving object made impossible maneuvers and left a glowing trail.',
        ];

        for ($i = 0; $i < 50; $i++) {
            $country = $countries[array_rand($countries)];
            
            // Select cities based on country
            if ($country === 'United States') {
                $city = $usCities[array_rand($usCities)];
            } elseif ($country === 'United Kingdom') {
                $city = $ukCities[array_rand($ukCities)];
            } elseif ($country === 'Canada') {
                $city = $canadaCities[array_rand($canadaCities)];
            } else {
                $city = 'Capital City'; // generic for other countries
            }
            
            // Generate a random date within the past year
            $date = Carbon::today()->subDays(rand(0, 365));
            
            // Generate a random time and combine with date
            $hour = str_pad(rand(0, 23), 2, '0', STR_PAD_LEFT);
            $minute = str_pad(rand(0, 59), 2, '0', STR_PAD_LEFT);
            $dateTime = $date->copy()->setTime($hour, $minute);
            
            Report::create([
                'date' => $dateTime,
                'country' => $country,
                'city' => $city,
                'street' => $streetNames[array_rand($streetNames)], // Always set a street
                'type' => $reportTypes[array_rand($reportTypes)],
                'description' => $descriptions[array_rand($descriptions)],
                'user_id' => $userIds[array_rand($userIds)],
                'validated' => rand(0, 1),
                'photo_path' => null,
            ]);
        }
    }
}