<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $profile['name'] . ' — Portfolio')</title>
    <meta name="description" content="{{ $profile['tagline'] ?? '' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="container navbar__inner">
            <a href="{{ route('portfolio.index') }}" class="navbar__brand">{{ $profile['name'] }}<span>.</span></a>

            <button class="navbar__toggle" id="navToggle" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>

            <nav class="navbar__links" id="navLinks">
                <a href="#about">About</a>
                {{-- <a href="#experience">Experience</a> --}}
                <a href="#skills">Skills</a>
                <a href="#projects">Projects</a>
                <a href="#certificates">Certificates</a>
                <a href="#connect">Connect</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer id="connect" class="footer">
        <div class="container footer__inner">
            <div class="footer__connect">
                <p class="footer__eyebrow">Get in Touch</p>
                <h2 class="footer__title">Let's Connect</h2>
                <p class="footer__text">
                    Feel free to reach out through any of the channels below —
                    I'd love to hear from you.
                </p>
                <div class="footer__links">
                    @if(!empty($profile['socials']['linkedin']))
                        <a href="{{ $profile['socials']['linkedin'] }}" target="_blank" rel="noopener" class="footer__link">
                            LinkedIn
                        </a>
                    @endif
                    @if(!empty($profile['email']))
                        <a href="mailto:{{ $profile['email'] }}" class="footer__link">
                            {{ $profile['email'] }}
                        </a>
                    @endif
                    @if(!empty($profile['phone']))
                        <a href="https://wa.me/{{ preg_replace('/\D/', '', $profile['phone']) }}" target="_blank" rel="noopener" class="footer__link">
                            {{ $profile['phone'] }}
                        </a>
                    @endif
                </div>
            </div>
            <p class="footer__copyright">&copy; {{ date('Y') }} {{ $profile['name'] }}. Built with Laravel.</p>
        </div>
    </footer>

    <script>
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        navToggle.addEventListener('click', () => {
            navLinks.classList.toggle('is-open');
            navToggle.classList.toggle('is-active');
        });

        document.querySelectorAll('.navbar__links a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('is-open');
                navToggle.classList.remove('is-active');
            });
        });
    </script>
</body>
</html>