<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'titolo',
        'slug',
        'descrizione_breve',
        'descrizione_dettagliata',
        'immagine_copertina',
        'tecnologie',
        'link_live',
        'link_github',
        'ordine',
    ];

    protected $casts = [
        'tecnologie' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
