<?php

namespace App\Http\Controllers;
use App\Models\Quote;

class AppController extends Controller
{
    public function main(){
        dump(Quote::all());
    }
}
