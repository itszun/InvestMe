<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class InvestorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('investor')->insert([
            [
                "id_user" => 3,
                "name" => "Lucas Vorlor",
                "birthdate" => "1999-05-04",
                "age" => 20,
                "address" => "Evolution Street 18A Bridgestone",
                "gender" => 'male',
            ],
            [
                "id_user" => 5,
                "name" => "Frank Oliver",
                "birthdate" => "1990-11-11",
                "age" => 29,
                "address" => "Beside My Neighbor House",
                "gender" => 'male',
            ]
        ]);
    }
}
