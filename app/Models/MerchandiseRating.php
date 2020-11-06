<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchandiseRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_id',
        'assessor_id',
        'rate'
    ];

    public $timestamps = false;
    protected $table = "rating_merchandise";
}
