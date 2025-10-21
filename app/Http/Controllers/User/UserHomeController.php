<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'tour'])
                ->where('confirmation_status', 'confirmed')
                ->where('payment_status', 'paid')
                ->get();
        $tours = Tour::where('endDay', '>', Carbon::now())->get();
        return view('fe.homePage', compact('tours','bookings'));
    }
}