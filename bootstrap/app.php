<?php

use Illuminate\Foundation\Application;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            '/logout'
        ]);
        $middleware->alias([
        'auth' => \App\Http\Middleware\Authenticate::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, $request) {
            if ($e instanceof UnauthorizedException) {
                if ($request->expectsJson()) {
                    return response()->json([
                        "code"    => 403,
                        "success" => false,
                        "message" => "You do not have right permissions.",
                        "data"    => null
                    ], 403);
                }
            }

            return null;
        });
    })->create();
