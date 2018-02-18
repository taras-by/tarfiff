<?php

use Illuminate\Database\Seeder;
use App\Models\Tariff;
use App\Models\Price;

class TariffsTableSeeder extends Seeder
{
    private $tariffs = [
        [
            'name' => 'Car reservation',
            'key' => 'reservation',
            'is_active' => true,
            'prices' => [
                [
                    'type' => 'basic',
                    'price' => 2.00,
                    'config' => [
                        'time_unit' => 'minute',
                    ],
                ],
                [
                    'type' => 'fix_for_interval_after_start',
                    'price' => 0.00,
                    'config' => [
                        'time_unit' => 'minute',
                        'interval_start' => 0,
                        'interval_end' => 20,
                    ],
                ],
                [
                    'type' => 'fix_for_time_interval',
                    'price' => 0.00,
                    'config' => [
                        'time_start' => '23:00:00',
                        'time_end' => '7:00:00',
                    ],
                ],
            ],
        ],
        [
            'name' => 'Car Inspection',
            'key' => 'inspection',
            'is_active' => true,
            'prices' => [
                [
                    'type' => 'basic',
                    'price' => 2.00,
                    'config' => [
                        'time_unit' => 'minute',
                    ],
                ],
                [
                    'type' => 'fix_for_interval_after_start',
                    'price' => 0.00,
                    'config' => [
                        'time_unit' => 'minute',
                        'interval_start' => 0,
                        'interval_end' => 7,
                    ],
                ],
            ],
        ],
        [
            'name' => 'Driving by car',
            'key' => 'driving',
            'is_active' => true,
            'prices' => [
                [
                    'type' => 'basic',
                    'price' => 8.00,
                    'config' => [
                        'time_unit' => 'minute',
                        'user_group_correction' => [
                            'preferential' => '-3.00',
                            'corporate' => '-1.00',
                        ],
                        'car_group_correction' => [
                            'premium' => '3.00',
                            'economy' => '-1.00',
                        ]
                    ],
                ],
                [
                    'type' => 'fix_for_distance_interval_each_time',
                    'price' => 0.00,
                    'config' => [
                        'time_unit' => 'day',
                        'distance_unit' => 'kilometre',
                        'distance_start' => 70
                    ],
                ],
                [
                    'type' => 'max_for_time',
                    'price' => 2700.00,
                    'config' => [
                        'time_unit' => 'day',
                    ],
                ],
            ],
        ],
        [
            'name' => 'Car Parking',
            'key' => 'parking',
            'is_active' => true,
            'prices' => [
                [
                    'type' => 'basic',
                    'price' => 2.00,
                    'config' => [
                        'time_unit' => 'minute',
                    ],
                ],
                [
                    'type' => 'fix_for_time_interval',
                    'price' => 0.00,
                    'config' => [
                        'time_start' => '23:00:00',
                        'time_end' => '7:00:00',
                    ],
                ],
            ],
        ],
        [
            'name' => 'Baby car seat',
            'key' => 'baby_car_seat',
            'is_active' => true,
            'prices' => [
                [
                    'type' => 'basic',
                    'price' => 2.00,
                    'config' => [
                        'time_unit' => 'minute',
                    ],
                ],
                [
                    'type' => 'add_each_time',
                    'price' => 300.00,
                    'config' => [
                        'time_unit' => 'day',
                        'user_group_correction' => [
                            'preferential' => '-100.00',
                        ],
                    ],
                ],
            ],
        ],
        [
            'name' => 'No active tariff',
            'key' => 'no_active_tariff',
            'is_active' => false,
            'prices' => [
                [
                    'type' => 'basic',
                    'price' => 5.00,
                    'config' => [
                        'time_unit' => 'minute',
                    ],
                ],
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
        foreach ($this->tariffs as $tariff_array) {
            $prices = $tariff_array['prices'] ?? [];
            unset($tariff_array['prices']);

            $tariff = Tariff::create($tariff_array);

            foreach ($prices as $price_array) {
                $price = Price::create($price_array);
                $tariff->prices()->save($price);
            }
        }
    }
}
