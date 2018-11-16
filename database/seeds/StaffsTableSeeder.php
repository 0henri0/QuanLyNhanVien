<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 2000;

        for ($i = 1; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'leader_id'=>rand(1, $i),
                'password' => bcrypt('123123'),
                'decription'=>$faker->sentence($nbWords = 6, $variableNbWords = true),
                'created_at'=> Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}