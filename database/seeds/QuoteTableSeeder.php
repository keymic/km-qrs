<?php

use Illuminate\Database\Seeder;

class QuoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quote')->insert([
            'content' => str_random(10) . ' ' . str_random(10) . ' ' . str_random(10) . ' ' . str_random(10) . ' ' . str_random(10) . ' ' . str_random(10),
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}
