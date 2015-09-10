<?php
/**
 * Created by PhpStorm.
 * User: mgorecki
 * Date: 10.07.15
 * Time: 14:57
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

final class Quote extends Model
{
    protected $fillable = ['author', 'text'];
}