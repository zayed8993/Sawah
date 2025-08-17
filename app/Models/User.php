<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * العلاقة مع الطلبات (Requests)
     */
    public function requests()
    {
        return $this->hasMany(\App\Models\Request::class);
    }
     /**
     * إذا أردت يمكن إضافة علاقة مباشرة مع الرحلات عبر الطلبات
     */
    public function trips()
    {
        return $this->hasManyThrough(
            \App\Models\Trip::class,   // الرحلات
            \App\Models\Request::class, // الطلبات
            'user_id',                  // مفتاح في جدول requests يشير إلى المستخدم
            'id',                       // مفتاح في جدول trips
            'id',                       // مفتاح المستخدم
            'trip_id'                   // مفتاح الرحلة في جدول requests
        );
    }
}
