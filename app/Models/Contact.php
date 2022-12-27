<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string email
 * @property string phone_number
 * @property tinyint age
 * @property string name
 */

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'age',
        'email'
    ];
}
