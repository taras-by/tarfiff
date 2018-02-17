<?php

use Illuminate\Database\Seeder;
use App\Model\Tariff;

class TariffsTableSeeder extends Seeder
{

    private $tariffs = [
        [
            'name' => 'First tariff'
        ],
        [
            'name' => 'Second tariff'
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
