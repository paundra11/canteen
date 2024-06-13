<?php

namespace Database\Seeders;

use App\Models\FixMoney;
use Illuminate\Database\Seeder;

class FixMoneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            FixMoney::create(['Money'=>'1000000']);
    }
}
