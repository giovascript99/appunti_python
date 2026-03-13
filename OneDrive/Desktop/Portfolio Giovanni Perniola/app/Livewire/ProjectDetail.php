<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectDetail extends Component
{
    public Project $project;

    public function mount(string $slug): void
    {
        $this->project = Project::where('slug', $slug)->firstOrFail();
    }

    public function title(): string
    {
        return $this->project->titolo . ' — Giovanni Perniola';
    }

    public function render()
    {
        return view('livewire.project-detail');
    }
}
