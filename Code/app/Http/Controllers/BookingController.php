<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function toggleStatus(Table $table)
    {
        $activeBooking = $table->activeBooking;

        if($activeBooking) {

            $activeBooking->delete();

            $message = "Meja $table->table_number ditandai kosong.";

            
        }else {
            Booking::create([
                'table_id' => $table->id,
                'user_id' => Auth::id(),
                'status' => 'filled',
            ]);

            $message = "Meja $table->table_number ditandai terisi.";
        }

        return redirect()->route('tables.index')->with('success', $message);
    }
}
