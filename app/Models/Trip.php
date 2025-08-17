<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'date',
        'location',
        'image',
    ];

    // Optional: Relation to requests
    public function requests()
    {
        return $this->hasMany(\App\Models\Request::class);
    }
}
