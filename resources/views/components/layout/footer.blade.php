<footer class="site-footer">

    <div class="site-footer-copy">© {{ date('Y') }} {{ config('portfolio.name') }}</div>

    <div class="site-footer-links">
        <x-ui.social-links :links="[
            ['href' => config('portfolio.github'), 'icon' => 'fa-brands fa-github', 'label' => 'GitHub'],
            ['href' => 'https://www.linkedin.com/in/stephan-kenmegne-kamdem/', 'icon' => 'fa-brands fa-linkedin', 'label' => 'LinkedIn'],
        ]" />

        <a href="mailto:{{ config('portfolio.email') }}" aria-label="Email">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        </a>
    </div>

</footer>
