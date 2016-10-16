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

    public function truncate($string, $length = 25, $append = " ...")
    {
        $string = trim($string);
        if (strlen($string) > $length) {
            $string = wordwrap($string, $length);
            $string = explode("\n", $string, 2);
            $string = $string[0] . $append;
        }

        return $string;
    }
}
