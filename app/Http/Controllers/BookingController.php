<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Field;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'field_id' => 'required|exists:fields,id',
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'whatsapp_number' => 'required|string|regex:/^[0-9]{10,15}$/', // Validasi nomor WhatsApp
        'booking_time' => 'required|date|after:now',
    ]);

    $field = Field::findOrFail($validated['field_id']);
    $price = $field->price_per_hour;

    // Cek apakah waktu booking sudah diambil
    $existingBooking = Booking::where('field_id', $validated['field_id'])
        ->where('booking_time', $validated['booking_time'])
        ->whereIn('status', ['pending', 'confirmed'])
        ->exists();

    if ($existingBooking) {
        return back()->withErrors(['booking_time' => 'Waktu ini sudah dipesan.'])->withInput();
    }

    // Buat booking dengan status default 'pending'
    Booking::create(array_merge($validated, [
        'price' => $price,
        'status' => 'pending', // Pastikan status diatur secara eksplisit
    ]));

    // Flash success message
    return back()->with('success', 'Booking telah dibuat, menunggu konfirmasi admin.');
}

}

