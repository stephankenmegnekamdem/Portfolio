<footer class="text-center" id="footer">

    <ul>
        <li><p class="my-grey">© {{ date('Y') }} {{ config('portfolio.name') }}</p></li>

        <li>
            <x-ui.social-links :links="[
                ['href' => config('portfolio.github'), 'icon' => 'fa-brands fa-github', 'label' => 'GitHub'],
                ['href' => 'https://www.linkedin.com/in/stephan-kenmegne-kamdem/', 'icon' => 'fa-brands fa-linkedin', 'label' => 'LinkedIn'],
            ]" />
        </li>

        <li>
            <a href="mailto:{{ config('portfolio.email') }}" aria-label="Email">
                <i class="material-icons">email</i>
            </a>
        </li>
    </ul>

</footer>
