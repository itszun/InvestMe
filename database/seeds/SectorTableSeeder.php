<?php

use Illuminate\Database\Seeder;

class SectorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sector')->insert([
          [
              "name" => "Aerospace"
          ],
          [
              "name" => "Fishing"
          ],
          [
              "name" => "Chemical"
          ],
          [
              "name" => "Tobacco"
          ],
          [
              "name" => "Pharmaceutical"
          ],
          [
              "name" => "Software"
          ],
          [
              "name" => "Education"
          ],
          [
              "name" => "Electrical Power"
          ],
          [
              "name" => "Fruit & Vegetables"
          ],
          [
              "name" => "Health Care"
          ],
          [
              "name" => "Automotive"
          ],
          [
              "name" => "Electronics"
          ],
          [
              "name" => "Steel"
          ],
          [
              "name" => "Shipbuilding"
          ],
          [
              "name" => "Film"
          ],
          [
              "name" => "Music"
          ],
          [
              "name" => "Transport"
          ]
        ]);
    }
}
