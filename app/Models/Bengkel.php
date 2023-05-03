<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['jambuka', 'jamtutup'];

    // public function photos()
    // {
    //     return $this->hasMany(BengkelPhoto::class, 'bengkel_id', 'id');
    // }
    
    public function scopeFilter($query)
    {
        if(request('search'))
        {
            return $query->where('title', 'like', '%' . request('search') . '%');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getBengkels($latitude, $longitude, $radius)
    {
        return $this->select('bengkels.*')
            ->selectRaw(
                '( 6371 *
                    acos( cos( radians(?) ) *
                        cos( radians( latitude ) ) *
                        cos( radians(longitude ) - radians(?)) +
                        sin( radians(?) ) *
                        sin( radians( latitude ) )
                    )
                ) AS distance', [$latitude, $longitude, $latitude]
            )
            ->havingRaw("distance < ?", [$radius])
            ->orderBy('distance', 'asc');
    }
}
