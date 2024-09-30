<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use \Illuminate\Routing\Router;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        function (Router $router) {
            $router->middleware('web')
                ->group(base_path('routes/web.php'));

            $router->middleware(['web', 'admin.guest'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));
        },
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin.auth' =>     App\Http\Middleware\AdminAuthenticate::class,
            'admin.guest' =>    App\Http\Middleware\AdminRedirectAuthenticated::class,
            // 'auth' =>           \Illuminate\Auth\Middleware\Authenticate::class,
            // 'guest' =>         \Illuminate\Auth\Middleware\RedirectIfAuthenticated::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
