<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $table = 'quote';

    public function rates()
    {
        return $this->hasMany('App\Models\Rate');
    }

    public function ratesPlus()
    {
        return $this->hasMany('App\Models\Rate')->where('rate', 1);
    }

    public function ratesMinus()
    {
        return $this->hasMany('App\Models\Rate')->where('rate', -1);
    }
}
