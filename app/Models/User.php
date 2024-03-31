<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'device_uuid', 'device_name', 'subscription_status','email','password','is_admin', 'name'
    ];
    protected $hidden = [
        'password',
    ];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    public function subscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }
    public function activeSubscription()
    {
        return $this->subscriptions()->where('status', true)->first();
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
