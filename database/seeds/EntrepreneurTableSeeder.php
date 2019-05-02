<?php

use Illuminate\Database\Seeder;

class EntrepreneurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entrepreneur')->insert([
            [
                "id_user" => 2,
                "name" => "Felix Krellix",
                "birthdate" => "1989-05-02",
                "age" => 30,
                "address" => "Evolution Street 18A Bridgestone",
                "gender" => 'male',
            ],
            [
                "id_user" => 4,
                "name" => "Asthorpe Joni",
                "birthdate" => "1980-12-21",
                "age" => 39,
                "address" => "Beside My Neighbor House",
                "gender" => 'male',
            ]
        ]);
    }
}
