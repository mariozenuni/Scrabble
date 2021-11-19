<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;


    protected $table = 'statistics';
    
    

    protected $casts = [
        
        'score' => 'integer',
        'wins'=>'integer',
        'losses'=>'integer',
        'user_id'=>'integer',
     
       
    ];

    protected $fillable = [
       
        'score',
        'wins',
        'losses',
        'user_id'
     
    ];


}
