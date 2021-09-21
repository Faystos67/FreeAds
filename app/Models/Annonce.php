<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'price',
        'address',
        'city',
        'phone'
    ];


    public function photo()
    {
        return $this->hasMany(Photo::class);
    }

    public function getFirstImageAttribute()
    {
        if (isset($this->photo->first()->picture))
        {
            return asset('/storage/' . $this->photo->first()->picture);
        }
        return null;
    }
}
