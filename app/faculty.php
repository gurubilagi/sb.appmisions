<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    public $fillable = [
        'details','category',
    ];
}


class Catagories extends Model
{
    public $fillable = [
        'catagories',
    ];
}