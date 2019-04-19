<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('level')->insert([
          [
              "name" => "entrepreneur"
          ],
          [
              "name" => "investor"
          ],
          [
              "name" => "admin"
          ]
        ]);
    }
}
