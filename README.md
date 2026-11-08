# Bataller Portfolio

A responsive, database-free personal portfolio for **Janray Dave T. Bataller**, a fourth-year Bachelor of Science in Information Technology student at **Data Center College of Bangued – Abra**.

The site is built with **Laravel 12**, **Blade**, **Tailwind CSS 4**, and **Vite**. It presents basic information, educational background, a certification dashboard, a project workspace with a dashboard, GitHub repository links, and contact details in a single, modern scrolling experience.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?logo=laravel&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-Templates-FF2D20)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4-06B6D4?logo=tailwindcss&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-7-646CFF?logo=vite&logoColor=white)

---

## Project description

This portfolio was created as the midterm activity for **IPA BSIT 4**. The goal was to build a static online portfolio using Laravel, track the work with Git, publish it to a public GitHub repository, and document every AI prompt used during development.

The application deliberately avoids a database. There are **no migrations, models, or seeders**; all content is stored in a single PHP configuration file and rendered with Blade. This keeps the project lightweight, portable, and easy to host for free.

### Highlights

- **Custom dark design system** built with Tailwind CSS 4 and hand-written CSS components.
- **Single-page portfolio** with hero, about, education timeline, certification dashboard, projects, GitHub, and contact sections.
- **Certification dashboard** showing earned credentials with their certificate images, titles, issuers, dates, and tags; each image opens the full-size certificate.
- **Project dashboard** at `/dashboard` that summarizes project status, certifications, portfolio readiness, education, and quick links.
- **Config-driven content** — update `config/portfolio.php` instead of editing Blade templates.
- **Empty project state** that automatically becomes a project grid when entries are added.
- **Responsive navigation** with a mobile menu, scroll progress bar, active-section highlighting, and scroll-reveal animations.
- **Accessibility-minded** — skip link, focus styles, reduced-motion support, semantic landmarks, and descriptive alt text.
- **No database required** — file sessions, file cache, and the sync queue driver.

---

## Tech stack

| Layer | Technology |
| --- | --- |
| Framework | Laravel 12 |
| Templating | Blade |
| Styling | Tailwind CSS 4 + custom CSS |
| Build tool | Vite 7 |
| Interactivity | Vanilla JavaScript |
| Icons | Inline SVG Blade component |
| Version control | Git + GitHub |

---

## Requirements

- PHP 8.2 or newer with the usual Laravel extensions
- Composer 2
- Node.js 20+ and npm
- Git

---

## Getting started

```bash
# 1. Install PHP dependencies
composer install

# 2. Create the environment file
copy .env.example .env        # Windows
# cp .env.example .env        # macOS / Linux

# 3. Generate the application key
php artisan key:generate

# 4. Install front-end dependencies and build assets
npm install
npm run build

# 5. Serve the application
php artisan serve
```

Open <http://localhost:8000>.

### Running with XAMPP

The project can also live inside `C:\xampp\htdocs\yarnaj_web`. Point your browser to:

```
http://localhost/yarnaj_web/public
```

For development, `php artisan serve` is still recommended because it handles asset URLs and routing more predictably.

---

## Editing the portfolio

All personal content lives in **`config/portfolio.php`**:

- `name`, `initials`, `role`, `tagline`
- `email`, `phone`, `location`
- `school`, `course`, `year_level`
- `bio`, `stats`, `skills`, `learning`
- `education`
- `certifications` (with certificate images in `public/images/certificates/`)
- `projects` (empty by default)
- `github` links
- `repo_stack`, `project_categories`

### Adding a project

Add an array to the `projects` key:

```php
'projects' => [
    [
        'title' => 'Inventory Management System',
        'description' => 'A stock tracking system for a small retail store.',
        'stack' => ['Laravel', 'MySQL', 'Tailwind CSS'],
        'status' => 'Completed',
        'repo' => 'https://github.com/davebataller/inventory-system',
        'demo' => null,
        'featured' => true,
    ],
],
```

The projects section and the dashboard automatically switch from the empty state to a project grid/table.

### Adding a certificate

Copy the certificate image into `public/images/certificates/`, then add an array to the `certifications` key:

```php
'certifications' => [
    [
        'title' => 'Introduction to Modern AI',
        'issuer' => 'Cisco Networking Academy',
        'issuer_short' => 'Cisco NetAcad',
        'date' => 'October 22, 2026',
        'year' => '2026',
        'type' => 'Certificate of Completion',
        'tags' => ['Artificial Intelligence', 'Cisco'],
        'description' => 'Completed the introductory course on modern AI.',
        'image' => 'images/certificates/cisco-introduction-to-modern-ai-2026.jpg',
        'alt' => 'Cisco Networking Academy Certificate of Completion for Introduction to Modern AI.',
    ],
],
```

The certification dashboard statistics, cards, and the `/dashboard` certifications panel all read from this array.

### Replacing the profile image

The current portrait is a generated SVG placeholder at `public/images/profile.svg`. Replace it with a real photo and update the `src` in `resources/views/partials/hero.blade.php` (or keep the filename).

### Phone number

The contact number is intentionally left as `09XX XXX XXXX` because only a partial number was provided. Update `phone` and set `phone_link` to the same number in `config/portfolio.php` to enable a tap-to-call link:

```php
'phone' => '09171234567',
'phone_link' => '09171234567',
```

---

## Project structure

```
app/Http/Controllers/PortfolioController.php   Page controller
config/portfolio.php                           All portfolio content
public/images/profile.svg                      Portrait placeholder
public/images/certificates/                    Certificate images
public/favicon.svg                             Favicon
resources/css/app.css                          Tailwind theme + design system
resources/js/app.js                            Navigation, reveal, copy interactions
resources/views/layouts/app.blade.php          Shared layout and SEO meta
resources/views/partials/                      Navbar, footer, and page sections
resources/views/portfolio/index.blade.php      Home page
resources/views/portfolio/dashboard.blade.php  Project dashboard
resources/views/components/                    Icon, project card, section heading
routes/web.php                                 Home and dashboard routes
PROMPT_LOG.md                                  AI prompt documentation
docs/                                          Word files for submission
```

---

## Routes

| Method | URI | Name | Description |
| --- | --- | --- | --- |
| GET | `/` | `home` | Single-page portfolio |
| GET | `/dashboard` | `dashboard` | Project dashboard |

---

## Deployment

Because the project has no database, it can be hosted on most free PHP platforms. A typical deployment flow:

1. Push the repository to GitHub.
2. Create a new web service on a PHP host (Render, Railway, Fly.io, or a school server).
3. Set the build command:
   ```bash
   composer install --no-dev --optimize-autoloader && npm ci && npm run build
   ```
4. Set the start command:
   ```bash
   php artisan serve --host=0.0.0.0 --port=$PORT
   ```
5. Add environment variables:
   ```
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=<generated key>
   APP_URL=https://your-app-url
   SESSION_DRIVER=file
   CACHE_STORE=file
   QUEUE_CONNECTION=sync
   ```
6. Run `php artisan config:cache` and `php artisan route:cache` during the build if the host allows it.

> Update the **Live demo** link below once deployed.

**Live demo:** _to be added after deployment_

---

## Git workflow

The repository uses descriptive commit messages that explain each change, for example:

```
feat: add education timeline with school history
style: polish project dashboard cards and empty state
docs: add README and AI prompt log
```

Vague messages such as `fix`, `update`, or `test` are avoided.

---

## AI documentation

Every prompt used during development is recorded in [PROMPT_LOG.md](PROMPT_LOG.md). A Word version of the prompt log and the Git commit history is included in the `docs/` folder for submission.

The project was built in **OpenCode** using the **Big Pickle** agent.

---

## Author

**Janray Dave T. Bataller**
Bachelor of Science in Information Technology — 4th Year
Data Center College of Bangued – Abra
Email: [davebataller20@gmail.com](mailto:davebataller20@gmail.com)
GitHub: [@davebataller](https://github.com/davebataller)

---

## License

This project is shared for educational purposes as part of the IPA BSIT 4 midterm activity.
