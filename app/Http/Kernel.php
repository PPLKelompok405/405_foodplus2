<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ... existing code ...

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // ... existing code ...
        'role' => \App\Http\Middleware\CheckRole::class,
    ];

    // ... existing code ...
}