<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_message'
    ];

    //Relationship with Message Model(1:M)
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    //Relationship with User Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
