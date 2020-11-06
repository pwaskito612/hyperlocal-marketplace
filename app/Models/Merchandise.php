<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;


    protected $fillable = [
        'seller_id',
        'price',
        'stock',
        'location',
        'title',
        'description',
        'weight',
        'deleted',
       
        
    ];
    
    public $timestamps = false;
    protected $table = "merchandises";

}
