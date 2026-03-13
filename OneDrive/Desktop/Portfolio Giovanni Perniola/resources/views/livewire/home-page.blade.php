<div>
    <!-- ============================================================
         HERO SECTION
    ============================================================ -->
    <section class="min-h-[90vh] flex flex-col items-center justify-center px-6 text-center">

        <div class="max-w-3xl mx-auto space-y-6">

            <!-- Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-neutral-200 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-900 text-xs font-medium text-neutral-500 dark:text-neutral-400">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                Disponibile per nuovi progetti
            </div>

            <!-- Titolo principale -->
            <h1 class="text-5xl sm:text-6xl md:text-7xl font-semibold tracking-tight text-neutral-900 dark:text-white leading-tight">
                Ciao, sono<br>
                <span class="text-neutral-400 dark:text-neutral-600">Giovanni.</span>
            </h1>

            <!-- Sottotitolo -->
            <p class="text-lg sm:text-xl text-neutral-500 dark:text-neutral-400 max-w-xl mx-auto leading-relaxed font-light">
                Full-Stack Developer appassionato di interfacce pulite, codice elegante e prodotti che le persone amano usare.
            </p>

            <!-- CTA -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4">
                <a href="#projects"
                   class="px-6 py-3 rounded-full bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 text-sm font-medium hover:opacity-80 transition-opacity">
                    Vedi i progetti
                </a>
                <a href="mailto:gioperniola1999@gmail.com"
                   class="px-6 py-3 rounded-full border border-neutral-200 dark:border-neutral-700 text-neutral-700 dark:text-neutral-300 text-sm font-medium hover:bg-neutral-50 dark:hover:bg-neutral-900 transition-colors">
                    Scrivimi
                </a>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 text-neutral-300 dark:text-neutral-700">
            <span class="text-xs tracking-widest uppercase">Scorri</span>
            <svg class="w-4 h-4 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </section>

    <!-- ============================================================
         PROJECTS SECTION
    ============================================================ -->
    <section id="projects" class="max-w-6xl mx-auto px-6 py-24">

        <div class="mb-16">
            <p class="text-xs font-semibold tracking-widest uppercase text-neutral-400 dark:text-neutral-600 mb-3">
                Lavori selezionati
            </p>
            <h2 class="text-3xl sm:text-4xl font-semibold text-neutral-900 dark:text-white tracking-tight">
                Progetti
            </h2>
        </div>

        @if($projects->isEmpty())
            <!-- Empty state -->
            <div class="flex flex-col items-center justify-center py-24 text-center">
                <div class="w-16 h-16 rounded-2xl bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-neutral-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                </div>
                <p class="text-neutral-500 dark:text-neutral-500">Nessun progetto ancora. Aggiungine dal database!</p>
            </div>
        @else
            <!-- Projects grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($projects as $project)
                    <a href="{{ route('projects.show', $project->slug) }}" wire:navigate
                       class="group relative flex flex-col overflow-hidden rounded-3xl border border-neutral-100 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-900 hover:border-neutral-200 dark:hover:border-neutral-700 transition-all duration-300 hover:shadow-xl hover:shadow-neutral-200/50 dark:hover:shadow-neutral-900/50 hover:-translate-y-1">

                        <!-- Cover image -->
                        @if($project->immagine_copertina)
                            <div class="aspect-video overflow-hidden bg-neutral-100 dark:bg-neutral-800">
                                <img src="{{ asset('storage/' . $project->immagine_copertina) }}"
                                     alt="{{ $project->titolo }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                        @else
                            <div class="aspect-video bg-gradient-to-br from-neutral-100 to-neutral-200 dark:from-neutral-800 dark:to-neutral-700 flex items-center justify-center">
                                <span class="text-4xl font-bold text-neutral-300 dark:text-neutral-600 select-none">
                                    {{ strtoupper(substr($project->titolo, 0, 2)) }}
                                </span>
                            </div>
                        @endif

                        <!-- Content -->
                        <div class="flex flex-col flex-1 p-6 gap-3">

                            <!-- Tech stack pills -->
                            @if($project->tecnologie)
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach(array_slice($project->tecnologie, 0, 4) as $tech)
                                        <span class="px-2.5 py-1 rounded-full text-xs font-medium bg-white dark:bg-neutral-800 border border-neutral-200 dark:border-neutral-700 text-neutral-600 dark:text-neutral-400">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <h3 class="text-lg font-semibold text-neutral-900 dark:text-white group-hover:text-neutral-600 dark:group-hover:text-neutral-300 transition-colors">
                                {{ $project->titolo }}
                            </h3>

                            <p class="text-sm text-neutral-500 dark:text-neutral-500 leading-relaxed flex-1">
                                {{ $project->descrizione_breve }}
                            </p>

                            <div class="flex items-center gap-1 text-sm font-medium text-neutral-900 dark:text-white mt-1">
                                Scopri il progetto
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </section>

    <!-- ============================================================
         ABOUT SECTION
    ============================================================ -->
    <section id="about" class="max-w-6xl mx-auto px-6 py-24 border-t border-neutral-100 dark:border-neutral-800">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

            <div class="space-y-6">
                <p class="text-xs font-semibold tracking-widest uppercase text-neutral-400 dark:text-neutral-600">
                    Chi sono
                </p>
                <h2 class="text-3xl sm:text-4xl font-semibold text-neutral-900 dark:text-white tracking-tight leading-tight">
                    Costruisco prodotti digitali che funzionano.
                </h2>
                <div class="space-y-4 text-neutral-500 dark:text-neutral-400 leading-relaxed">
                    <p>
                        Sono Giovanni Perniola, un Full-Stack Developer con la passione per le interfacce curate e per il codice pulito. Lavoro principalmente con Laravel, Livewire e Vue.js.
                    </p>
                    <p>
                        Ogni progetto è un'opportunità per unire tecnica ed estetica: mi piace che le cose funzionino bene <em>e</em> abbiano un bell'aspetto.
                    </p>
                </div>
                <a href="mailto:gioperniola1999@gmail.com"
                   class="inline-flex items-center gap-2 text-sm font-medium text-neutral-900 dark:text-white hover:opacity-60 transition-opacity">
                    Contattami
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>

            <!-- Skills -->
            <div class="grid grid-cols-2 gap-3">
                @foreach(['Laravel', 'PHP', 'Livewire', 'Vue.js', 'Tailwind CSS', 'MySQL', 'Git', 'Linux'] as $skill)
                    <div class="px-4 py-3 rounded-2xl border border-neutral-100 dark:border-neutral-800 bg-neutral-50 dark:bg-neutral-900 text-sm font-medium text-neutral-700 dark:text-neutral-300">
                        {{ $skill }}
                    </div>
                @endforeach
            </div>

        </div>
    </section>
</div>
