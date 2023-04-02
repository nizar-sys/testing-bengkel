<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function photos()
    {
        return $this->hasMany(BengkelPhoto::class, 'bengkel_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
