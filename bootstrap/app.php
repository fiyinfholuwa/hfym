<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Always fetch fresh Laravel pages so visitors do not need to clear
        // an old page or error response from their browser cache.
        $middleware->append(\App\Http\Middleware\NoCache::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
