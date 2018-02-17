<?php

use Illuminate\Database\Seeder;
use App\Model\Tariff;

class TariffsTableSeeder extends Seeder
{

    private $tariffs = [
        [
            'name' => 'First tariff',
            'key' => 'first',
            'is_active' => true,
            'config' => [
                'price' => 100
            ],
        ],
        [
            'name' => 'Second tariff',
            'key' => 'second',
            'is_active' => true,
            'config' => [
                'price' => 200
            ],
        ],
        [
            'name' => 'Baby car seat',
            'key' => 'baby_car_seat',
            'is_active' => true,
            'config' => [
                'price' => 200
            ],
        ],
        [
            'name' => 'No active tariff',
            'key' => 'third',
            'is_active' => false,
            'config' => [
                'price' => 200
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
