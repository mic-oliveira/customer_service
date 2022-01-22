<?php

use Illuminate\Routing\Middleware\SubstituteBindings;

return [
    /*
     *  Automatic registration of routes will only happen if this setting is `true`
     */
    'enabled' => true,

    /*
     * Controllers in these directories that have routing attributes
     * will automatically be registered.
     */
    'directories' => [
        app_path('Http/Controllers'),
    ],

    /**
     * This middleware will be applied to all routes.
     */
    'middleware' => [
        SubstituteBindings::class
    ],

    'middlewareGroup' => [
        'api' => [
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ]
];
