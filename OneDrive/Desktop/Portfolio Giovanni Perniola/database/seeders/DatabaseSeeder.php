<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'titolo' => 'Portfolio Personale',
                'slug' => 'portfolio-personale',
                'descrizione_breve' => 'Il sito che stai guardando adesso. Costruito con Laravel, Livewire 3 e Tailwind CSS.',
                'descrizione_dettagliata' => "Questo portfolio è stato progettato con un'attenzione maniacale ai dettagli: dalla Navbar glassmorphism con effetto scroll, al toggle light/dark persistente, fino all'esperienza SPA ottenuta grazie a wire:navigate di Livewire 3.\n\nLo stack tecnologico combina la solidità di Laravel 11 sul backend con la reattività di Livewire 3 sul frontend, il tutto stilizzato con Tailwind CSS v4 e animato con Alpine.js.",
                'immagine_copertina' => null,
                'tecnologie' => ['Laravel', 'Livewire', 'Tailwind CSS', 'Alpine.js'],
                'link_live' => null,
                'link_github' => 'https://github.com/gioperniola',
                'ordine' => 1,
            ],
            [
                'titolo' => 'E-commerce Platform',
                'slug' => 'ecommerce-platform',
                'descrizione_breve' => 'Piattaforma e-commerce completa con gestione prodotti, carrello e pagamenti Stripe.',
                'descrizione_dettagliata' => "Una soluzione e-commerce costruita da zero con Laravel. Include gestione catalogo prodotti, sistema di categorie, carrello persistente, checkout con Stripe, e pannello amministrativo custom.\n\nL'interfaccia utente è stata progettata per massimizzare le conversioni, con pagine prodotto ottimizzate e un checkout snello in 3 step.",
                'immagine_copertina' => null,
                'tecnologie' => ['Laravel', 'PHP', 'Stripe', 'MySQL', 'Vue.js'],
                'link_live' => null,
                'link_github' => null,
                'ordine' => 2,
            ],
            [
                'titolo' => 'Dashboard Analytics',
                'slug' => 'dashboard-analytics',
                'descrizione_breve' => 'Dashboard real-time per monitoraggio KPI aziendali con grafici interattivi.',
                'descrizione_dettagliata' => "Una dashboard amministrativa per visualizzare metriche di business in tempo reale. I dati vengono aggiornati via WebSocket senza refresh della pagina.\n\nI grafici sono costruiti con Chart.js e vengono alimentati da un'API Laravel. Il design segue i principi del data visualization per rendere le informazioni immediatamente comprensibili.",
                'immagine_copertina' => null,
                'tecnologie' => ['Laravel', 'Livewire', 'Chart.js', 'WebSockets'],
                'link_live' => null,
                'link_github' => null,
                'ordine' => 3,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
