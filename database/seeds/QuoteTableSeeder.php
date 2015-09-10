<?php
/**
 * Created by PhpStorm.
 * User: mgorecki
 * Date: 07.09.15
 * Time: 13:47
 */

use App\Models\Quote;
use Illuminate\Database\Seeder;

class QuoteTableSeeder extends Seeder
{
    public function run()
    {
        Quote::create([
            'text' => 'Lorem ipsum',
            'author' => 'Phill Factor'
        ]);

        Quote::create([
            'text' => 'test content2',
            'author' => 'Panczo'
        ]);

        Quote::create([
            'text' => 'test content3',
            'author' => 'Yosi'
        ]);

    }
}