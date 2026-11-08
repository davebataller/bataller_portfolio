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
- **Certification dashboard** showing earned credentials with their certificate images, titles, issuers, dates, award details, and skills; each image opens the full-size certificate and can be downloaded, with All / Completions / Participations filtering.
- **Project showcase** featuring **A QR Code Based Event Attendance** for DCCP-Bangued (S.Y. 2025–2026) with login and admin dashboard screenshots, live-attendance details, and stack tags.
- **Project dashboard** at `/dashboard` that summarizes project status, certifications, portfolio readiness, education, and quick links.
- **Config-driven content** — update `config/portfolio.php` instead of editing Blade templates.
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

- `name`, `initials`, `profile_image`, `profile_alt`, `role`, `tagline`
- `email`, `phone`, `location`
- `school`, `course`, `year_level`
- `bio`, `stats`, `skills`, `learning`
- `education`
- `certifications` (with certificate images in `public/images/certificates/`)
- `projects` (with screenshots in `public/images/projects/`)
- `github` links
- `repo_stack`, `project_categories`

### Adding a project

Add an array to the `projects` key:

```php
'projects' => [
    [
        'title' => 'A QR Code Based Event Attendance',
        'description' => 'A QR code-based event attendance system for DCCP-Bangued (S.Y. 2025–2026) with admin login, live attendance, and QR scanning.',
        'stack' => ['Laravel', 'PHP', 'MySQL', 'Tailwind CSS'],
        'status' => 'Completed',
        'repo' => null,
        'demo' => null,
        'featured' => true,
        'images' => [
            [
                'path' => 'images/projects/qr-event-attendance-dashboard.jpg',
                'alt' => 'Admin dashboard of the QR Code Event Attendance System.',
            ],
            [
                'path' => 'images/projects/qr-event-attendance-login.jpg',
                'alt' => 'Login page of the QR Code Event Attendance System.',
            ],
        ],
    ],
],
```

Copy screenshots into `public/images/projects/` and list them under `images`. The projects section and the dashboard automatically show the project grid/table, and project cards render the screenshots when `images` is present.

### Adding a certificate

Copy the certificate image into `public/images/certificates/`, then add an array to the `certifications` key:

```php
'certifications' => [
    [
        'title' => 'Introduction to Modern AI',
        'issuer' => 'Cisco Networking Academy',
        'issuer_short' => 'Cisco NetAcad',
        'issuer_url' => 'https://www.netacad.com/',
        'awarded_to' => 'Janray Dave T. Bataller',
        'date' => 'October 22, 2026',
        'year' => '2026',
        'type' => 'Certificate of Completion',
        'mode' => 'Online · Cisco Networking Academy',
        'tags' => ['Artificial Intelligence', 'Cisco'],
        'skills' => ['Modern AI concepts', 'AI applications'],
        'description' => 'Completed the introductory course on modern AI.',
        'image' => 'images/certificates/cisco-introduction-to-modern-ai-2026.jpg',
        'orientation' => 'landscape',
        'alt' => 'Cisco Networking Academy Certificate of Completion for Introduction to Modern AI.',
        'credential_id' => null,
        'verify_url' => null,
    ],
],
```

The certification dashboard statistics, cards, and the `/dashboard` certifications panel all read from this array. `orientation` (`portrait`/`landscape`) is informational — cards always show the full image without cropping using a contained image over a blurred backdrop. Optional `credential_id` and `verify_url` lines appear only when set. Use the All / Completions / Participations pills on the page to filter the cards without reloading.

### Profile photo

The portrait at `public/images/profile.jpg` is used in both the hero card and the About profile card. Replace that file with a new photo (any portrait image) or change `profile_image` and `profile_alt` in `config/portfolio.php` to point to a different file. The hero uses a 4:5 frame with `object-cover`, so faces should stay near the top of the image.

### Phone number

The contact number is `0951 060 1537` (`phone_link` `09510601537`) in `config/portfolio.php`, so the About and Contact sections render a tap-to-call `tel:` link. To change it, update both keys:

```php
'phone' => '0951 060 1537',
'phone_link' => '09510601537',
```

---

## Project structure

```
app/Http/Controllers/PortfolioController.php   Page controller
api/index.php                                  Vercel serverless entry point
vercel.json                                    Vercel build/runtime/deploy config
.vercelignore                                  Vercel upload exclusions
config/portfolio.php                           All portfolio content
public/images/profile.jpg                      Profile photo (hero + About)
public/images/profile.svg                      Fallback portrait placeholder
public/images/certificates/                    Certificate images
public/images/projects/                        Project screenshots
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

## Deployment on Vercel

This project deploys to **Vercel** as a serverless PHP app using the community `vercel-php` runtime. It needs no database, queue worker, or scheduler, so it fits Vercel’s model. The setup is three files:

- `api/index.php` — forwards every request to `public/index.php` and ensures `/tmp` cache directories exist
- `vercel.json` — PHP runtime (`vercel-php@0.7.4`), build commands, catch-all rewrite, and production environment
- `.vercelignore` — excludes `/vendor`, `/node_modules`, and `/.env` from the upload

Vercel’s deployment filesystem is **read-only** and only `/tmp` is writable, so `vercel.json` points Laravel’s compiled views and bootstrap caches at `/tmp` (`VIEW_COMPILED_PATH`, `APP_CONFIG_CACHE`, `APP_EVENTS_CACHE`, `APP_PACKAGES_CACHE`, `APP_ROUTES_CACHE`, `APP_SERVICES_CACHE`) and switches to disk-free drivers (`CACHE_STORE=array`, `SESSION_DRIVER=cookie`) with logs to `stderr`. All portfolio images and files live in `public/`, so they are served as static files.

### Deploy from GitHub (recommended)

1. Push this repository to GitHub (public repo: `bataller_portfolio`).

2. Go to the Vercel Dashboard and click **Add New → Project**, then import `davebataller/bataller_portfolio`.

3. In **Build & Development Settings**, leave the framework as **Other** and keep the commands from `vercel.json`:

   - Install Command: `npm ci`
   - Build Command: `npm run build`

   (The PHP runtime runs `composer install` itself — do **not** add `composer install` to the build command.)

4. Add these **Environment Variables** (Production, Preview, Development):

   | Name | Value | Notes |
   | --- | --- | --- |
   | --- | --- | --- |
   | `APP_KEY` | `base64:...` | **Required secret.** Generate once locally with `php artisan key:generate --show` and paste it here. Never commit it to Git. |
   | `APP_ENV` | `production` | Already in `vercel.json` |
   | `APP_DEBUG` | `false` | Already in `vercel.json` |
   | `APP_URL` | `https://your-project.vercel.app` | Optional. Update to your production domain after the first deploy. |
   | `LOG_CHANNEL` | `stderr` | Already in `vercel.json` |
   | `CACHE_STORE` | `array` | Already in `vercel.json` |
   | `SESSION_DRIVER` | `cookie` | Already in `vercel.json` |
   | `QUEUE_CONNECTION` | `sync` | Already in `vercel.json` |

   Generate the key locally first:
   ```bash
   php artisan key:generate --show
   ```

5. Click **Deploy**. After the first deployment, update `APP_URL` to the assigned `*.vercel.app` domain and redeploy if needed.

6. Smoke-test the deployment:
   ```bash
   curl https://your-project.vercel.app/health   # → {"status":"ok"}
   curl https://your-project.vercel.app/up
   curl -I https://your-project.vercel.app/images/profile.jpg
   ```

### Deploy with the Vercel CLI

Alternatively, from the project root:

```bash
npm install -g vercel
vercel env add APP_KEY      # paste the key from `php artisan key:generate --show`
vercel --prod
```

### Important notes for serverless

- **Runtime logs:** because `LOG_CHANNEL=stderr`, Laravel logs appear in **Vercel → Project → Logs**, not in a `laravel.log` file.
- **No persistence:** `/tmp` is cleared on cold starts. That is fine here because the site is static and uses array cache / cookie sessions.
- **Migrations:** not needed — this project is database-free.
- **Do not run** `php artisan config:cache` or `php artisan route:cache` in the build command; Vercel provides env vars at runtime.

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
