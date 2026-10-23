# Stephan Kenmegne Kamdem: Portfolio Website

A personal portfolio built with Laravel, Blade, Vite, and plain CSS and JavaScript. It presents my profile, education, work, skills, projects, a printable CV, and a working contact form, in a dark "terminal" visual style.

- **Live site:** (add your URL)
- **Repository:** https://github.com/stephankenmegnekamdem/Portfolio
- **Contact:** set in `.env` as `PORTFOLIO_CONTACT_EMAIL`

---

## Contents

1. [Purpose](#purpose)
2. [Features at a glance](#features-at-a-glance)
3. [Technology stack](#technology-stack)
4. [Software engineering disciplines in this project](#software-engineering-disciplines-in-this-project)
5. [Project structure](#project-structure)
6. [Requirements](#requirements)
7. [Local setup](#local-setup)
8. [Configuration](#configuration)
9. [Running and building](#running-and-building)
10. [Testing](#testing)
11. [Documentation in this folder](#documentation-in-this-folder)
12. [Licence](#licence)

---

## Purpose

The portfolio has three jobs:

1. **Present me to recruiters and collaborators:** who I am, what I have studied, and what I have built.
2. **Show engineering practice, not just results:** the site itself is a project with a clear structure, reusable components, secure form handling, and accessibility choices.
3. **Be easy to maintain:** almost all personal content lives in one configuration file, so updating the site rarely means editing templates.

## Features at a glance

- Full-screen scrolling home page with a hero card, personal panels, and timelines
- Interactive timelines: circles open to show details
- Project tile grid and one full screen per project, with screenshots and structured details
- Printable CV page
- Contact form with spam protection, rate limiting, validation, and email delivery
- Terminal-style effects: typed commands, pixelated images, typewriter text (all can be turned off with the OS "reduce motion" setting)
- Side section menu, scroll arrow, scroll progress bar, reveal-on-scroll animation
- Copy-email button

The full explanation of each feature and why it exists is in `FEATURES.md`.

## Technology stack

| Layer | Technology |
|---|---|
| Server | PHP 8.5, Laravel (11 or newer) |
| Templates | Blade with anonymous components |
| Styling | CSS split into files, CSS custom properties, Tailwind CSS v4 (print button only) |
| Scripts | Vanilla JavaScript ES modules, no framework |
| Build | Vite, laravel-vite-plugin, @tailwindcss/vite |
| Email | Laravel Mail with a mailable and Blade email view |
| Icons | Font Awesome 6.7.2 (CDN), Material Icons (Google Fonts) |
| Font | Instrument Sans (Bunny Fonts, through the Vite plugin) |
| Version control | Git |

## Software engineering disciplines in this project

This project touches most of the areas a junior-to-mid software engineer is expected to understand. The table shows where each one appears.

| Discipline | What it covers in this project | Where to look |
|---|---|---|
| **Front-end development** | HTML structure, responsive CSS (three breakpoints), Flexbox and Grid, CSS custom properties, vanilla JavaScript modules, DOM events | `resources/css/`, `resources/js/`, `resources/views/` |
| **Back-end development** | Routing, controllers, validation, redirects with flash messages, configuration management | `routes/web.php`, `app/Http/Controllers/` |
| **Full-stack development** | Data flows from config and controllers through Blade to the browser, and back through the form | `config/portfolio.php` to `pages/` to the browser |
| **UI and visual design** | Design tokens (colours, spacing, radii), a consistent terminal theme, motion design | `resources/css/base/_variables.css` |
| **UX and accessibility** | `aria-label` and `aria-current`, keyboard support on the scroll arrow, `prefers-reduced-motion`, semantic `details`/`summary` for expandable content, visible focus states | Components and `resources/css/` |
| **Software architecture** | Layouts, slots, anonymous components with props, separation of content (config) from presentation (views) | `resources/views/components/` |
| **Component-based design** | Reusable Blade components for repeated markup, with clear inputs and defaults | `resources/views/components/` |
| **Modular CSS** | Base, layout, components, pages, and utilities, loaded in a defined order | `resources/css/app.css` |
| **Modular JavaScript** | One module per feature, shared helpers in `lib/`, a single entry file | `resources/js/` |
| **Build tooling** | npm, Vite, Tailwind plugin, dependency management | `vite.config.js`, `package.json` |
| **Security** | CSRF protection on forms, input validation, output escaping in Blade, honeypot anti-spam, rate limiting, header injection prevention (validated email), environment-based secrets | `ContactController.php`, `routes/web.php`, `.env` |
| **Email and communication** | Mailable classes, reply-to addresses, queueable mail | `app/Mail/ContactMessage.php`, `resources/views/emails/` |
| **Performance** | Lazy-loaded images, one bundled JavaScript file, reduced motion, small screenshot strips | `resources/views/components/sections/` |
| **SEO and metadata** | Page titles, meta description, `lang` attribute, semantic headings | `resources/views/components/layouts/partials/head.blade.php` |
| **Quality assurance (QA)** | Manual test checklists per page, browser console checks, print-preview checks, mobile breakpoint checks, form edge cases (empty fields, honeypot, rate limit) | `FEATURES.md`, `IMPROVEMENTS.md` |
| **Testing (automated)** | Not yet implemented. Recommended tests are listed in `IMPROVEMENTS.md` | `tests/` (to be added) |
| **Refactoring** | Splitting a large stylesheet and script into modules without changing the rendered result, with a mapping table for each step | Git history |
| **DevOps and deployment** | Environment configuration, production build, config and route caching, web server setup, HTTPS, monitoring | `IMPROVEMENTS.md`, section "Deployment" |
| **Version control** | Git branches and commits for each stage of the refactor | Git history |
| **Documentation** | This README, a context document for AI assistants, a features guide, and an improvements list | `portfolio-docs/` |

## Project structure

```
app/                     Controllers and mailable
config/portfolio.php     All personal content
public/                  Images and assets served to the browser
resources/css/           Stylesheets (entry: app.css)
resources/js/            JavaScript (entry: app.js)
resources/views/         Pages, layouts, components, email view
routes/web.php           Routes
portfolio-docs/          Documentation (this folder)
```

For a full map, see `PORTFOLIO_CONTEXT.md`.

## Requirements

| Requirement | Version |
|---|---|
| PHP | 8.5 (8.3 or newer is likely fine; confirm with `composer.json`) |
| Composer | 2.x |
| Node.js | 20 LTS or newer (installed via fnm in development) |
| npm | Comes with Node |
| Git | Any recent version |
| A mail service | For production: SMTP or a transactional provider. For development: the `log` mailer |

## Local setup

```bash
# 1. Clone the repository
git clone <repository-url> portfolio
cd portfolio

# 2. Install PHP dependencies
composer install

# 3. Create the environment file and key
cp .env.example .env
php artisan key:generate

# 4. Set your contact email and mail settings in .env (see Configuration)

# 5. Install JavaScript dependencies
npm install

# 6. Start the development server and the asset watcher (two terminals)
php artisan serve
npm run dev
```

Open http://127.0.0.1:8000.

## Configuration

### Environment (`.env`)

| Variable | Purpose | Example |
|---|---|---|
| `APP_NAME` | Application name | `Portfolio` |
| `APP_ENV` | `local` in development, `production` when live | `local` |
| `APP_DEBUG` | `true` in development, **`false` in production** | `true` |
| `APP_URL` | Public address | `http://127.0.0.1:8000` |
| `PORTFOLIO_CONTACT_EMAIL` | Where contact messages are sent, and the email shown on the site | `you@example.com` |
| `MAIL_MAILER` | `log` for testing, `smtp` or a provider in production | `log` |
| `MAIL_*` | Host, port, username, password, and from address for your mail service | see Laravel docs |

### Content (`config/portfolio.php`)

All names, links, projects, and timeline content are here. See `PORTFOLIO_CONTEXT.md`, section 6, for the structure and the rule that the two project lists must stay in the same order.

### Testing the contact form without sending real email

Set `MAIL_MAILER=log`. Submitted messages are written to `storage/logs/laravel.log`.

## Running and building

| Task | Command |
|---|---|
| Development server | `php artisan serve` |
| Watch and rebuild assets | `npm run dev` |
| Production build | `npm run build` |
| Clear caches | `php artisan view:clear` and `php artisan config:clear` |
| List routes | `php artisan route:list` |

## Testing

### Manual checks (in use now)

The page-by-page checklist is in `IMPROVEMENTS.md` (section "Test checklist"). Run it after every change, on desktop and on a phone-sized window.

### Automated tests (recommended, not yet written)

Laravel ships with PHPUnit or Pest. The first tests worth adding are listed in `IMPROVEMENTS.md`, section "Recommended tests".

## Documentation in this folder

| File | Read it when |
|---|---|
| `README.md` | You are new to the project or setting it up |
| `PORTFOLIO_CONTEXT.md` | You want an AI assistant (or a new developer) to understand the project quickly |
| `FEATURES.md` | You want to know what each feature does and why it is there |
| `IMPROVEMENTS.md` | You want to know what is broken, what to improve, or what to do before deploying |

## Licence

Private project. Personal content (text, photos, CV, certificates) is copyright Stephan Kenmegne Kamdem. Add a licence file if you want to open-source the code.

