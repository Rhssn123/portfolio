@extends('layouts.app')

@section('content')

    {{-- HERO --}}
    <section class="hero">
        <div class="container hero__inner">
            <div class="hero__text">
                <p class="hero__greet">Halo, saya</p>
                <h1 class="hero__name">{{ $profile['name'] }}</h1>
                <h2 class="hero__title">{{ $profile['title'] }}</h2>
                <p class="hero__tagline">{{ $profile['tagline'] }}</p>
                <div class="hero__cta">
                    <a href="#projects" class="btn btn--primary">Lihat Proyek</a>
                    <a href="#contact" class="btn btn--outline">Hubungi Saya</a>
                </div>
            </div>
            <div class="hero__avatar">
                <div class="hero__avatar-ring">
                    <span>{{ collect(explode(' ', $profile['name']))->map(fn($w) => $w[0])->join('') }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT --}}
    <section id="about" class="section">
        <div class="container">
            <p class="section__eyebrow">Tentang</p>
            <h2 class="section__title">Kenalan Yuk</h2>
            <div class="about__grid">
                <p class="about__text">{{ $profile['about'] }}</p>
                <ul class="about__info">
                    <li><strong>Nama</strong><span>{{ $profile['name'] }}</span></li>
                    <li><strong>Lokasi</strong><span>{{ $profile['location'] }}</span></li>
                    <li><strong>Email</strong><span>{{ $profile['email'] }}</span></li>
                </ul>
            </div>
        </div>
    </section>

    {{-- SKILLS --}}
    <section id="skills" class="section section--alt">
        <div class="container">
            <p class="section__eyebrow">Keahlian</p>
            <h2 class="section__title">Tools &amp; Teknologi</h2>
            <div class="skills">
                @foreach($skills as $skill)
                    <div class="skill">
                        <div class="skill__head">
                            <span>{{ $skill['name'] }}</span>
                            <span>{{ $skill['level'] }}%</span>
                        </div>
                        <div class="skill__bar">
                            <div class="skill__bar-fill" style="width: {{ $skill['level'] }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PROJECTS --}}
    <section id="projects" class="section">
        <div class="container">
            <p class="section__eyebrow">Portofolio</p>
            <h2 class="section__title">Proyek Pilihan</h2>
            <div class="projects">
                @foreach($projects as $project)
                    <article class="project-card">
                        <div class="project-card__image">
                            <span>{{ $project['title'] }}</span>
                        </div>
                        <div class="project-card__body">
                            <h3>{{ $project['title'] }}</h3>
                            <p>{{ $project['description'] }}</p>
                            <div class="project-card__tech">
                                @foreach($project['tech'] as $tech)
                                    <span class="tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                            <a href="{{ route('portfolio.show', $project['slug']) }}" class="project-card__link">
                                Lihat Detail &rarr;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    <section id="contact" class="section section--alt">
        <div class="container container--narrow">
            <p class="section__eyebrow">Kontak</p>
            <h2 class="section__title">Mari Berkolaborasi</h2>

            @if(session('success'))
                <div class="alert alert--success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('portfolio.contact') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <span class="form-error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <span class="form-error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                    @error('message') <span class="form-error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn--primary">Kirim Pesan</button>
            </form>
        </div>
    </section>

@endsection