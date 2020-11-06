<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'source',
        'destiny',
        'merchandise_id',
        'amount',
        'time',
        'confirmed',

    ];

    public $timestamps = false;
    protected $table = "Transactions";
}
