@extends('layouts.app')

@section('content')

    {{-- HERO --}}
    <section class="hero">
        <div class="container hero__inner">
            <div class="hero__text">
                <p class="hero__greet">Hi, I'm</p>
                <h1 class="hero__name">{{ $profile['name'] }}</h1>
                <h2 class="hero__title">{{ $profile['title'] }}</h2>
                <p class="hero__tagline">{{ $profile['tagline'] }}</p>
                <div class="hero__cta">
                    <a href="#projects" class="btn btn--primary">View Projects</a>
                    <a href="#contact" class="btn btn--outline">Contact Me</a>
                    {{-- <a href="{{ asset('files/' . $profile['resume']) }}" target="_blank" class="btn btn--outline">Download CV</a> --}}
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
            <p class="section__eyebrow">About</p>
            <h2 class="section__title">Get to Know Me</h2>
            <div class="about__grid">
                <div>
                    <p class="about__text">{{ $profile['about'] }}</p>
                    <a href="{{ asset('files/' . $profile['resume']) }}" target="_blank" class="btn btn--primary about__cv-btn">
                        Download CV
                    </a>
                </div>
                <ul class="about__info">
                    <li><strong>Name</strong><span>{{ $profile['name'] }}</span></li>
                    <li><strong>Location</strong><span>{{ $profile['location'] }}</span></li>
                    <li><strong>Email</strong><span>{{ $profile['email'] }}</span></li>
                </ul>
            </div>
        </div>
    </section>

    {{-- SKILLS --}}
    <section id="skills" class="section section--alt">
        <div class="container">
            <p class="section__eyebrow">Skills</p>
            <h2 class="section__title">Tools &amp; Abilities</h2>

            <h3 class="skills__subtitle">Skills</h3>
            <div class="skills">
                @foreach($hardSkills as $skill)
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
            <p class="section__eyebrow">Portfolio</p>
            <h2 class="section__title">Projects</h2>
            <div class="projects">
                @foreach($projects as $project)
                    <article class="project-card">
                        <div class="project-card__image">
                            <img src="{{ asset('img/' . $project['image']) }}" alt="{{ $project['title'] }} screenshot">
                        </div>
                        <div class="project-card__body">
                            <div class="project-card__head">
                                <h3>{{ $project['title'] }}</h3>
                                <span class="project-card__period">{{ $project['period'] }}</span>
                            </div>
                            <p>{{ $project['description'] }}</p>
                            <div class="project-card__tech">
                                @foreach($project['tech'] as $tech)
                                    <span class="tag">{{ $tech }}</span>
                                @endforeach
                            </div>
                            {{-- <a href="{{ $profile['socials']['linkedin'] }}" target="_blank" rel="noopener" class="project-card__link">
                                View Details on LinkedIn &rarr;
                            </a> --}}
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CERTIFICATES & ACHIEVEMENTS --}}
    <section id="certificates" class="section">
        <div class="container">
            <p class="section__eyebrow">Certificates</p>
            <h2 class="section__title">Certificates &amp; Achievements</h2>

            <h3 class="skills__subtitle">Certificates</h3>
            <div class="certificates">
                @foreach($certificates as $cert)
                    <div class="certificate-card">
                        <div class="certificate-card__body">
                            <h3>{{ $cert['title'] }}</h3>
                            <p class="certificate-card__issuer">{{ $cert['issuer'] }}</p>
                        </div>
                        <div class="certificate-card__footer">
                            <span class="certificate-card__period">{{ $cert['period'] }}</span>
                            @if(!empty($cert['file']))
                                <a href="{{ asset('certificates/' . $cert['file']) }}" target="_blank" rel="noopener">
                                    View &rarr;
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <h3 class="skills__subtitle">Achievements</h3>
            <div class="certificates">
                @foreach($achievements as $ach)
                    <div class="certificate-card">
                        <div class="certificate-card__body">
                            <h3>{{ $ach['title'] }}</h3>
                            <p class="certificate-card__issuer">{{ $ach['issuer'] }}</p>
                        </div>
                        <div class="certificate-card__footer">
                            <span class="certificate-card__period">{{ $ach['period'] }}</span>
                            @if(!empty($ach['file']))
                                <a href="{{ asset('certificates/' . $ach['file']) }}" target="_blank" rel="noopener">
                                    View &rarr;
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CONTACT --}}
    {{-- <section id="contact" class="section section--alt">
        <div class="container container--narrow">
            <p class="section__eyebrow">Contact</p>
            <h2 class="section__title">Let's Collaborate</h2>

            @if(session('success'))
                <div class="alert alert--success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('portfolio.contact') }}" method="POST" class="contact-form">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name') <span class="form-error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email') <span class="form-error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                    @error('message') <span class="form-error">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn--primary">Send Message</button>
            </form>
        </div>
    </section> --}}

@endsection