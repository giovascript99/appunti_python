<div>
    <!-- ============================================================
         HERO DEL PROGETTO
    ============================================================ -->
    <section class="max-w-4xl mx-auto px-6 pt-20 pb-12">

        <!-- Back link -->
        <a href="{{ route('home') }}" wire:navigate
           class="inline-flex items-center gap-2 text-sm text-neutral-400 hover:text-neutral-700 dark:hover:text-neutral-200 transition-colors mb-10">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Tutti i progetti
        </a>

        <!-- Tech stack -->
        @if($project->tecnologie)
            <div class="flex flex-wrap gap-2 mb-6">
                @foreach($project->tecnologie as $tech)
                    <span class="px-3 py-1 rounded-full text-xs font-medium border border-neutral-200 dark:border-neutral-700 text-neutral-500 dark:text-neutral-400">
                        {{ $tech }}
                    </span>
                @endforeach
            </div>
        @endif

        <!-- Titolo -->
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-semibold text-neutral-900 dark:text-white tracking-tight leading-tight mb-6">
            {{ $project->titolo }}
        </h1>

        <!-- Descrizione breve -->
        <p class="text-lg sm:text-xl text-neutral-500 dark:text-neutral-400 leading-relaxed max-w-2xl">
            {{ $project->descrizione_breve }}
        </p>

        <!-- CTA Links -->
        <div class="flex flex-wrap gap-3 mt-8">
            @if($project->link_live)
                <a href="{{ $project->link_live }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-neutral-900 dark:bg-white text-white dark:text-neutral-900 text-sm font-medium hover:opacity-80 transition-opacity">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Vedi live
                </a>
            @endif

            @if($project->link_github)
                <a href="{{ $project->link_github }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-neutral-200 dark:border-neutral-700 text-neutral-700 dark:text-neutral-300 text-sm font-medium hover:bg-neutral-50 dark:hover:bg-neutral-800 transition-colors">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                    </svg>
                    GitHub
                </a>
            @endif
        </div>
    </section>

    <!-- ============================================================
         IMMAGINE COPERTINA
    ============================================================ -->
    @if($project->immagine_copertina)
        <div class="max-w-5xl mx-auto px-6 mb-16">
            <div class="rounded-3xl overflow-hidden border border-neutral-100 dark:border-neutral-800 shadow-2xl shadow-neutral-200/40 dark:shadow-neutral-900/60">
                <img src="{{ asset('storage/' . $project->immagine_copertina) }}"
                     alt="{{ $project->titolo }}"
                     class="w-full object-cover">
            </div>
        </div>
    @else
        <div class="max-w-5xl mx-auto px-6 mb-16">
            <div class="aspect-video rounded-3xl bg-gradient-to-br from-neutral-100 to-neutral-200 dark:from-neutral-800 dark:to-neutral-700 flex items-center justify-center border border-neutral-100 dark:border-neutral-800">
                <span class="text-8xl font-bold text-neutral-200 dark:text-neutral-700 select-none">
                    {{ strtoupper(substr($project->titolo, 0, 2)) }}
                </span>
            </div>
        </div>
    @endif

    <!-- ============================================================
         DESCRIZIONE DETTAGLIATA
    ============================================================ -->
    @if($project->descrizione_dettagliata)
        <article class="max-w-3xl mx-auto px-6 pb-24">
            <div class="prose prose-neutral dark:prose-invert prose-lg max-w-none
                        prose-headings:font-semibold prose-headings:tracking-tight
                        prose-p:text-neutral-500 dark:prose-p:text-neutral-400
                        prose-p:leading-relaxed">
                {!! nl2br(e($project->descrizione_dettagliata)) !!}
            </div>
        </article>
    @endif

    <!-- ============================================================
         NAVIGAZIONE (prossimo progetto potenziale)
    ============================================================ -->
    <div class="border-t border-neutral-100 dark:border-neutral-800 py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <a href="{{ route('home') }}" wire:navigate
               class="inline-flex items-center gap-2 text-sm font-medium text-neutral-500 dark:text-neutral-400 hover:text-neutral-900 dark:hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Torna a tutti i progetti
            </a>
        </div>
    </div>
</div>
