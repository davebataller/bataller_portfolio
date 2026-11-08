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

require __DIR__ . '/../public/index.php';
