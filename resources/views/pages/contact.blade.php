@extends("components.layouts.contact-cvapp")

@section('title', 'Contact — ' . config('portfolio.name'))

@section('content')
<section class="screen contact-page">
    <div class="screen-body">
        <div class="cf-wrap">

            {{-- Left: context --}}
            <aside class="cf-info">
                <span class="cf-eyebrow">Contact</span>
                <h1 class="cf-title">Let's build something together</h1>
                <p class="cf-lead">
                    Have a project, a question, or an opportunity in mind? Send a message and I'll get back to you.
                </p>

                <ul class="cf-links">
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <a href="mailto:{{ config('portfolio.email') }}">{{ config('portfolio.email') }}</a>
                        <button type="button"
                            class="cf-copy"
                            data-copy="{{ config('portfolio.email') }}"
                            aria-label="Copy email address">
                        <i class="fa-regular fa-copy"></i>
                        <span class="cf-copy-label">Copy</span>
                         </button>
                    </li>
                    <li>
                        <i class="fa-brands fa-github"></i>
                        <a href="{{ config('portfolio.github') }}" target="_blank" rel="noopener">GitHub</a>
                    </li>
                    <li>
                        <i class="fa-brands fa-linkedin-in"></i>
                        <a href="{{ config('portfolio.linkedin') }}" target="_blank" rel="noopener">LinkedIn</a>
                    </li>

                </ul>

                <p class="cf-reply"><i class="fa-regular fa-clock"></i> Usually replies within 2 business days</p>
            </aside>

            {{-- Right: form --}}
            <div class="cf-card">

                @if (session('success'))
                    <div class="cf-success">
                        <i class="fa-solid fa-circle-check"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="cf-form" novalidate>
                    @csrf

                    {{-- Honeypot: hidden from humans --}}
                    <div class="cf-hp" aria-hidden="true">
                        <label>Website <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
                    </div>

                    <div class="cf-row">
                        <div class="cf-field">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                                   placeholder="Your name" required maxlength="100">
                            @error('name') <p class="cf-error">{{ $message }}</p> @enderror
                        </div>

                        <div class="cf-field">
                            <label for="email">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                                   placeholder="you@example.com" required maxlength="150">
                            @error('email') <p class="cf-error">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <fieldset class="cf-field">
                        <legend>What is this about? <span class="cf-optional">optional</span></legend>
                        <div class="cf-chips">
                            @php
                                $topics = [
                                    'freelance'     => 'Freelance',
                                    'job'           => 'Job opportunity',
                                    'collaboration' => 'Collaboration',
                                    'other'         => 'Other',
                                ];
                            @endphp
                            @foreach ($topics as $value => $label)
                                <label class="cf-chip">
                                    <input type="radio" name="subject" value="{{ $value }}"
                                           @checked(old('subject') === $value)>
                                    <span>{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </fieldset>

                    <div class="cf-field">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="6" required minlength="10" maxlength="3000"
                                  placeholder="Tell me about the project, the timeline, and what you're hoping to achieve">{{ old('message') }}</textarea>
                        @error('message') <p class="cf-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="cf-actions">
                        <button type="submit" class="cf-submit">
                                <span class="cf-submit-label">Send message</span> <i class="fa-solid fa-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
@endsection
