<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'price_per_hour', 'location'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(FieldImage::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}