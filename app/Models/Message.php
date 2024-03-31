<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_id', 'user_message', 'bot_reply'
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }
}
