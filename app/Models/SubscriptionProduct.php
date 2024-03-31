<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionProduct extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'chat_limit', 'price'];
}
