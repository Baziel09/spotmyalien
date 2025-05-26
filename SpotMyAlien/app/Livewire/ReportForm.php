<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ReportForm extends Component
{
    use WithFileUploads;

    public $name;
    public $message;
    public $photo;
    public $location;

    // Validation rules
    protected $rules = [
        'name' => 'required|min:3',
        'message' => 'required|min:10',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        'location' => 'required',
    ];

    // Real-time validation (optional)
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Handle form submission
    public function submit()
    {
        $this->validate();

        // Save to database
        $report = Report::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'message' => $this->message,
            'location' => $this->location,
            'photo_path' => $this->photo ? $this->photo->store('reports/photos', 'public') : null,
        ]);

        // Reset form
        $this->reset();

        // Show success message
        session()->flash('success', 'Report submitted successfully!');
    }

    public function render()
    {
        return view('livewire.report-form');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:10240', // 10MB max
        ]);
    }
}
