<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;


    protected $table = 'players';
    public $timestamps = true;

    protected $casts = [
        'score' => 'integer'
    ];

    protected $fillable = [
     
        'name',
        'email',
        'address',
        'score'
     
    ];


}
