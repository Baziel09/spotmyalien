<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Enums\ReportType;
use Illuminate\Validation\Rules\Enum;
use App\Models\Report;
use Carbon\Carbon; 

class ReportForm extends Component
{
    use WithFileUploads;

    public $description = ''; // Changed from $message to avoid conflicts
    public $photo;
    public $country = '';
    public $city = '';
    public $street = '';
    public $date;
    public $time;
    public $type = '';

    protected $messages = [
        'date.before_or_equal' => 'De datum mag niet in de toekomst zijn',
        'description.max' => 'De beschrijving mag maximaal 2000 tekens zijn',
    ];

    public function rules()
    {
        return [
            'description' => 'required|max:2000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'nullable|string|max:255',
            'date' => 'required|date|before_or_equal:today',
            'time' => 'required|date_format:H:i',
            'type' => ['required', new Enum(ReportType::class)],
        ];
    }

    public function mount()
    {
        $this->date = now()->format('Y-m-d');
        $this->time = now()->format('H:i');
    }

    // Real-time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Handle form submission
    public function submit()
    {
        $this->validate();

        $photoPath = null;
        if ($this->photo) {
            try {
                $photoPath = $this->photo->store('reports', 'public');
            } catch (\Exception $e) {
                $this->addError('photo', 'Failed to upload photo: '.$e->getMessage());
                return;
            }
        }

        // Save to database
        try {
            $report = Report::create([
                'user_id' => "1",
                'date' => Carbon::parse($this->date . ' ' . $this->time),
                'country' => $this->country,
                'city' => $this->city,
                'street' => $this->street,
                'description' => $this->description,
                'photo_path' => $photoPath,
                'type' => $this->type,
                'validated' => false,
            ]);

            // Reset form
            $this->reset(['description', 'photo', 'country', 'city', 'street', 'type']);
            $this->date = now()->format('Y-m-d');
            $this->time = now()->format('H:i');
            
            session()->flash('success', 'Report submitted successfully!');
            
        } catch (\Exception $e) {
            $this->addError('submit', 'Failed to submit report: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.report-form');
    }

    // Get the enum values for the select dropdown - FIXED
    public function getReportTypesProperty()
    {
        return collect(ReportType::cases())->mapWithKeys(function ($case) {
            return [$case->value => $case->label()]; // Use label() instead of name
        })->toArray();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
    }
}