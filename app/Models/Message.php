<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'conversation_id',
        'read',
        'type',
        'body'
    ];

    //Relationship with Conversation Model(1:M)
    public function conversations()
    {
        return $this->belongsTo(Conversation::class);
    }

    //Relationship with User Model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
