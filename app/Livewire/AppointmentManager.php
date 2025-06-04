<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class AppointmentManager extends Component
{
    public $appointments;

    // Edit variables
    public $editId = null;
    public $editType, $editPetName, $editDate, $editTime, $editNotes;

    public function mount()
    {
        $this->loadAppointments();
    }

    public function loadAppointments()
    {
        $this->appointments = Service::where('user_id', Auth::id())->latest()->get();
    }

    public function delete($id)
    {
        $appointment = Service::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $appointment->delete();

        $this->loadAppointments();

        session()->flash('success', 'Appointment deleted successfully!');
    }

    public function edit($id)
    {
        $appointment = Service::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $this->editId = $appointment->id;
        $this->editType = $appointment->type;
        $this->editPetName = $appointment->pet_name;
        $this->editDate = $appointment->preferred_date;
        $this->editTime = $appointment->preferred_time;
        $this->editNotes = $appointment->notes;
    }

    public function update()
    {
        $this->validate([
            'editPetName' => 'required|string|max:255',
            'editDate' => [
                'required',
                'date',
                'after_or_equal:today',
                'before_or_equal:' . now()->addDays(7)->toDateString(),
            ],
            'editTime' => 'required',
            'editNotes' => 'nullable|string',
        ]);

        $appointment = Service::findOrFail($this->editId);
        $appointment->update([
            'pet_name' => $this->editPetName,
            'preferred_date' => $this->editDate,
            'preferred_time' => $this->editTime,
            'notes' => $this->editNotes,
        ]);

        session()->flash('success', 'Appointment updated successfully.');

        $this->resetEditFields();
        $this->loadAppointments(); // ✅ This line forces Livewire to refresh the updated appointment list
    }



    public function resetEditFields()
    {
        $this->editId = null;
        $this->editType = null;
        $this->editPetName = null;
        $this->editDate = null;
        $this->editTime = null;
        $this->editNotes = null;
    }

    public function render()
    {
        return view('livewire.appointment-manager');
    }
}
