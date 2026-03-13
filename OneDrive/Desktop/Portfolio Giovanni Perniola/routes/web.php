<?php

use App\Livewire\HomePage;
use App\Livewire\ProjectDetail;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/projects/{slug}', ProjectDetail::class)->name('projects.show');
