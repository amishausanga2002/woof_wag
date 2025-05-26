<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Service::with('user')->latest()->get();
        return view('admin.appointments.index', compact('appointments'));
    }
    public function destroy($id)
{
    $appointment = Service::findOrFail($id);
    $appointment->delete();

    return Redirect::route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
}
}

