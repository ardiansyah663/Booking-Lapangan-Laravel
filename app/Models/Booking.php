<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['field_id', 'name', 'address', 'whatsapp_number', 'booking_time', 'status', 'price'];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}