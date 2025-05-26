<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmationMail;

class ServiceController
{
    public function index()
    {
        $services = Service::where('user_id', Auth::id())->latest()->get();
        return view('services', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'pet_name' => 'required',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required',
        ]);

        $appointment = Service::create([
            'user_id' => Auth::id(),
            'type' => $request->type,
            'pet_name' => $request->pet_name,
            'preferred_date' => $request->preferred_date,
            'preferred_time' => $request->preferred_time,
            'notes' => $request->notes,
        ]);

        $appointment->load('user'); // ✅ ensure the user is accessible in the mailable

        Mail::to(Auth::user()->email)->send(new AppointmentConfirmationMail($appointment));

        return back()->with('success', 'Service booked successfully!');
    }
}
