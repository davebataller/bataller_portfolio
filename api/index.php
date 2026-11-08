<?php

// Vercel serverless entry point.
// Vercel expects function entry points inside `api/`. Laravel's real front
// controller is `public/index.php`, so forward every request to it.
//
// Why the /tmp directories here? Vercel's deployment filesystem is read-only
// and only /tmp is writable. Laravel writes compiled Blade views, bootstrap
// caches, and framework cache files on every cold start. vercel.json points
// those locations at /tmp via VIEW_COMPILED_PATH and the APP_*_CACHE
// variables, and this file makes sure the directories exist before Laravel
// boots so the first request does not fail on a missing directory.

foreach ([
    '/tmp',
    '/tmp/storage',
    '/tmp/storage/framework',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/sessions',
] as $dir) {
    if (! is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Use Vercel's production URL as APP_URL when it is not set explicitly.
// Vercel injects VERCEL_URL (e.g. "my-app.vercel.app") on every request.
if (
    empty($_ENV['APP_URL'] ?? null) &&
    empty($_SERVER['APP_URL'] ?? null) &&
    ! empty($_ENV['VERCEL_URL'] ?? ($_SERVER['VERCEL_URL'] ?? null))
) {
    $url = 'https://' . ($_ENV['VERCEL_URL'] ?? $_SERVER['VERCEL_URL']);
    $_ENV['APP_URL'] = $url;
    $_SERVER['APP_URL'] = $url;
    putenv('APP_URL=' . $url);
}

// Ephemeral APP_KEY fallback so the site renders even if APP_KEY was not set
// in the Vercel dashboard (Laravel throws MissingAppKeyException otherwise).
// This portfolio is stateless — no database, auth, or encrypted payloads that
// must survive restarts — so a per-instance key is safe here. When APP_KEY is
// set in the dashboard it is used as-is and this fallback is skipped.
if (empty($_ENV['APP_KEY'] ?? null) && empty($_SERVER['APP_KEY'] ?? null)) {
    $key = 'base64:' . base64_encode(random_bytes(32));
    $_ENV['APP_KEY'] = $key;
    $_SERVER['APP_KEY'] = $key;
    putenv('APP_KEY=' . $key);
}

require __DIR__ . '/../public/index.php';
