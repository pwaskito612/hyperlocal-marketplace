<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchandiseImage extends Model
{
    use HasFactory;


    protected $fillable = [
        'merchandise_id',
        'image_url',       
        
    ];

    protected $table = "merchandise_images";
}
