<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weight;

class WeightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 10件のテストデータを生成
        for ($i = 0; $i < 10; $i++) {
            Weight::create([
                'weight' => rand(50, 120), // 50から120の範囲でランダムな体重を生成
            ]);
        }
    }
}
