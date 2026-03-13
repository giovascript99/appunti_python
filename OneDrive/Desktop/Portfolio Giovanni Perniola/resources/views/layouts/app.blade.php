<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="themeManager()"
      x-init="init()"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Giovanni Perniola — Developer' }}</title>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-white dark:bg-neutral-950 text-neutral-800 dark:text-neutral-200 transition-colors duration-300">

    <!-- ============================================================
         NAVBAR
    ============================================================ -->
    <header
        x-data="navbar()"
        x-init="init()"
        :class="scrolled
            ? 'backdrop-blur-md bg-white/70 dark:bg-neutral-950/70 border-b border-neutral-200/60 dark:border-neutral-800/60 shadow-sm'
            : 'bg-transparent border-b border-transparent'"
        class="fixed top-0 inset-x-0 z-50 transition-all duration-300 ease-in-out">

        <nav class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

            <!-- Logo / Nome -->
            <a href="{{ route('home') }}" wire:navigate
               class="text-lg font-semibold tracking-tight text-neutral-900 dark:text-white hover:opacity-70 transition-opacity">
                Giovanni<span class="text-neutral-400 dark:text-neutral-500">.</span>
            </a>

            <!-- Links (desktop) -->
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-neutral-600 dark:text-neutral-400">
                <a href="{{ route('home') }}" wire:navigate
                   class="hover:text-neutral-900 dark:hover:text-white transition-colors">
                    Progetti
                </a>
                <a href="#about"
                   class="hover:text-neutral-900 dark:hover:text-white transition-colors">
                    Chi sono
                </a>
                <a href="mailto:gioperniola1999@gmail.com"
                   class="hover:text-neutral-900 dark:hover:text-white transition-colors">
                    Contatti
                </a>
            </div>

            <!-- Dark Mode Toggle -->
            <button
                @click="toggleDark()"
                class="w-10 h-10 flex items-center justify-center rounded-full hover:bg-neutral-100 dark:hover:bg-neutral-800 transition-colors"
                :aria-label="darkMode ? 'Passa alla modalità chiara' : 'Passa alla modalità scura'">

                <!-- Sun icon (visible in dark mode) -->
                <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1.5M12 19.5V21M4.22 4.22l1.06 1.06M18.72 18.72l1.06 1.06M3 12h1.5M19.5 12H21M4.22 19.78l1.06-1.06M18.72 5.28l1.06-1.06M15.5 12a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0z"/>
                </svg>

                <!-- Moon icon (visible in light mode) -->
                <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-neutral-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>
                </svg>
            </button>

        </nav>
    </header>

    <!-- ============================================================
         MAIN CONTENT
    ============================================================ -->
    <main class="pt-16">
        {{ $slot }}
    </main>

    <!-- ============================================================
         FOOTER
    ============================================================ -->
    <footer class="mt-32 border-t border-neutral-100 dark:border-neutral-800">
        <div class="max-w-6xl mx-auto px-6 py-10 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-neutral-400 dark:text-neutral-600">
                © {{ date('Y') }} Giovanni Perniola. Tutti i diritti riservati.
            </p>
            <div class="flex items-center gap-5">
                <a href="https://github.com/gioperniola" target="_blank" rel="noopener"
                   class="text-neutral-400 hover:text-neutral-700 dark:hover:text-neutral-200 transition-colors text-sm">
                    GitHub
                </a>
                <a href="https://linkedin.com/in/giovanni-perniola" target="_blank" rel="noopener"
                   class="text-neutral-400 hover:text-neutral-700 dark:hover:text-neutral-200 transition-colors text-sm">
                    LinkedIn
                </a>
            </div>
        </div>
    </footer>

    @livewireScripts

    <script>
        function themeManager() {
            return {
                darkMode: false,

                init() {
                    // Legge la preferenza salvata o usa quella del sistema
                    const saved = localStorage.getItem('theme');
                    if (saved === 'dark') {
                        this.darkMode = true;
                    } else if (saved === 'light') {
                        this.darkMode = false;
                    } else {
                        this.darkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    }
                },

                toggleDark() {
                    this.darkMode = !this.darkMode;
                    localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
                },
            }
        }

        function navbar() {
            return {
                scrolled: false,

                init() {
                    this.scrolled = window.scrollY > 20;
                    window.addEventListener('scroll', () => {
                        this.scrolled = window.scrollY > 20;
                    }, { passive: true });
                },
            }
        }
    </script>
</body>
</html>
