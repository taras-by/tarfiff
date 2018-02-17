<?php

use Illuminate\Database\Seeder;
use App\Model\Tariff;

class TariffsTableSeeder extends Seeder
{
    private $tariffs = [
        [
            'name' => 'Car reservation',
            'key' => 'reservation',
            'is_active' => true,
            'config' => [
                'prices' => [
                    [
                        'type' => 'basic',
                        'price' => 2,
                        'time_unit' => 'minute',
                    ],
                    [
                        'type' => 'fix_for_interval_after_start',
                        'price' => 0,
                        'time_unit' => 'minute',
                        'interval_start' => 0,
                        'interval_end' => 20,
                    ],
                    [
                        'type' => 'time_interval',
                        'price' => 0,
                        'time_start' => '23:00:00',
                        'time_end' => '7:00:00',
                    ],
                ]
            ],
        ],
        [
            'name' => 'Car Inspection',
            'key' => 'inspection',
            'is_active' => true,
            'config' => [
                'prices' => [
                    [
                        'type' => 'basic',
                        'price' => 2,
                        'time_unit' => 'minute',
                    ],
                    [
                        'type' => 'fix_for_interval_after_start',
                        'price' => 0,
                        'time_unit' => 'minute',
                        'interval_start' => 0,
                        'interval_end' => 7,
                    ],
                ]
            ],
        ],
        [
            'name' => 'Driving by car',
            'key' => 'driving',
            'is_active' => true,
            'config' => [
                'prices' => [
                    [
                        'type' => 'basic',
                        'price' => 8,
                        'time_unit' => 'minute',
                        'user_group_correction' =>[
                            'preferential' => -3,
                            'corporate' => -1,
                        ],
                        'car_group_correction' =>[
                            'premium' => 3,
                            'economy' => -1,
                        ]
                    ],
                    [
                        'type' => 'fix_for_distance_interval_each_time',
                        'price' => 0,
                        'time_unit' => 'day',
                        'distance_unit' => 'kilometre',
                        'distance_start' => 70
                    ],
                    [
                        'type' => 'max_for_time',
                        'price' => 2700,
                        'time_unit' => 'day',
                    ],
                ]
            ],
        ],
        [
            'name' => 'Car Parking',
            'key' => 'parking',
            'is_active' => true,
            'config' => [
                'prices' => [
                    [
                        'type' => 'basic',
                        'price' => 2,
                        'time_unit' => 'minute',
                    ],
                    [
                        'type' => 'fix_for_time_interval',
                        'price' => 0,
                        'time_unit' => 'minute',
                        'time_start' => '23:00:00',
                        'time_end' => '7:00:00',
                    ],
                ]
            ],
        ],
        [
            'name' => 'Baby car seat',
            'key' => 'baby_car_seat',
            'is_active' => true,
            'config' => [
                'prices' => [
                    [
                        'type' => 'basic',
                        'price' => 2,
                        'time_unit' => 'minute',
                    ],
                    [
                        'type' => 'add_each_time',
                        'price' => 300,
                        'time_unit' => 'day',
                        'user_group_correction' =>[
                            'preferential' => -100,
                        ],
                    ],
                ]
            ],
        ],
        [
            'name' => 'No active tariff',
            'key' => 'no_active_tariff',
            'is_active' => false,
            'config' => [
                'prices' => [
                    [
                        'type' => 'basic',
                        'price' => 5,
                        'time_unit' => 'minute',
                    ],
                ]
            ],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->tariffs as $tariff) {
            Tariff::create($tariff);
        }
    }
}
