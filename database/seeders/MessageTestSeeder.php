<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('chatroom_1')->insert([
            "chat" => "ini chat pertama yang ada di aplikasi ini",
            "username" => "akubiasa_12"
        ]);
    }
}
