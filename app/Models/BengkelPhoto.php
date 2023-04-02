<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BengkelPhoto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bengkel()
    {
        return $this->belongsTo(Bengkel::class, 'bengkel_id', 'id');
    }
}
