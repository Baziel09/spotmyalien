<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class MyReports extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';
    public $filterType = '';
    
    // Modal properties
    public $showModal = false;
    public $selectedReport = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'created_at'],
        'sortDirection' => ['except' => 'desc'],
        'filterType' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function viewReport($reportId)
    {
        $this->selectedReport = Report::where('id', $reportId)
                                    ->where('user_id', Auth::id())
                                    ->first();
        
        if ($this->selectedReport) {
            $this->showModal = true;
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedReport = null;
    }

    public function deleteReport($reportId)
    {
        $report = Report::where('id', $reportId)
                       ->where('user_id', Auth::id())
                       ->first();
        
        if ($report) {
            $report->delete();
            session()->flash('success', 'Melding succesvol verwijderd.');
            
            // Close modal if the deleted report was being viewed
            if ($this->selectedReport && $this->selectedReport->id == $reportId) {
                $this->closeModal();
            }
        } else {
            session()->flash('error', 'Melding niet gevonden of geen toegang.');
        }
    }

    public function render()
    {
        $reports = Report::where('user_id', Auth::id())
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('description', 'like', '%' . $this->search . '%')
                      ->orWhere('city', 'like', '%' . $this->search . '%')
                      ->orWhere('type', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterType, function ($query) {
                $query->where('type', $this->filterType);
            })
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate(9);

        $reportTypes = Report::where('user_id', Auth::id())
            ->distinct()
            ->pluck('type')
            ->filter();

        return view('livewire.my-reports', [
            'reports' => $reports,
            'reportTypes' => $reportTypes
        ]);
    }
}