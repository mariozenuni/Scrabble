<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leader extends Player
{
    use HasFactory;


    protected $table = 'players';
    public $timestamps = true;

    protected $casts = [
        'score' => 'integer'
    ];

  


}
