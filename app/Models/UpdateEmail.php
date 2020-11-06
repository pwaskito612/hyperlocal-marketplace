<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateEmail extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'user_id',
        'previous_email',
        'new_email',
    ];

    protected $table = 'update_email';
}
