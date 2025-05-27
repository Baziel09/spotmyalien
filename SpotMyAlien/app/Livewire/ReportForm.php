<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ReportForm extends Component
{
    use WithFileUploads;

    public $message;
    public $photo;
    public $country;
    public $city;
    public $street;
    public $date;
    public $time;
    public $type_id;

    // Validation rules
    protected $rules = [
        'message' => 'required|min:10',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        'country' => 'required',
        'city' => 'required',
        'street' => 'nullable',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'type_id' => 'required|in:accident,theft,vandalism',

    ];

    protected $messages = [
        'date.before_or_equal' => 'The date cannot be in the future',
        'message.max' => 'Description must not exceed 2000 characters',
    ];

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->time = now()->format('H:i');
    }

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
            'date' => Carbon::parse($this->date . ' ' . $this->time),
            'country' => $this->country,
            'city' => $this->city,
            'street' => $this->street,
            'description' => $this->message,
            'photo_path' => $this->photo?->store('reports/photos', 'public'),
            'type_id' => $this->type_id,
            'validated' => 0,
        ]);

        // Reset form
        $this->resetExcept(['date', 'time']);
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
