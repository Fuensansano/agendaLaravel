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
        'email',
        'user_id',
        'photo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sharedWithUsers()
    {
        return $this->belongsToMany(User::class,'contact_shares');
    }
}
