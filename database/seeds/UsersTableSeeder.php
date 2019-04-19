<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "username" => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("admin"),
                "level" => 3,
                "account_stat" => 2
            ],
            [
                "username" => "dombatersesat",
                "email" => "domba@penggembala.com",
                "password" => Hash::make("penggembala"),
                "level" => 1,
                "account_stat" => 2
            ],
            [
                "username" => "budakkorporat",
                "email" => "kerja@lembur.com",
                "password" => Hash::make("kerjalembur"),
                "level" => 2,
                "account_stat" => 2
            ],
            [
                "username" => "susukaleng",
                "email" => "bendera@susu.com",
                "password" => Hash::make("susukokgula"),
                "level" => 1,
                "account_stat" => 1
            ],
            [
                "username" => "berduitsangad",
                "email" => "waktu@uang.com",
                "password" => Hash::make("foyafoya"),
                "level" => 2,
                "account_stat" => 1
            ]
        ]);
    }
}
