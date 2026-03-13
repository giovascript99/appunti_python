<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Giovanni Perniola — Developer & Designer')]
class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page', [
            'projects' => Project::orderBy('ordine')->get(),
        ]);
    }
}
