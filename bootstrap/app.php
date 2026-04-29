<?php

use App\Http\Middleware\CheckStoreOwnership;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // $middleware->append(\App\Http\Middleware\GzipCompressionMiddleware::class);
        // $middleware->append(\App\Http\Middleware\PerformanceMiddleware::class);
        $middleware->alias([
            'store_owner' => CheckStoreOwnership::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (Throwable $e, Request $request) {
            if ($request->is('api/*') || $request->expectsJson() || $request->isMethod('POST')) {
                if ($e instanceof ValidationException) {
                    return response()->json([
                        'success' => false,
                        'message' => 'بيانات المدخلات غير صالحة',
                        'errors' => $e->errors(),
                        'data' => null,
                    ], 422);
                }

                if ($e instanceof NotFoundHttpException) {
                    return response()->json([
                        'success' => false,
                        'message' => 'المورد غير موجود',
                        'data' => null,
                    ], 404);
                }

                if ($e instanceof AuthenticationException) {
                    return response()->json([
                        'success' => false,
                        'message' => 'غير مصرح لك بالوصول، يرجى تسجيل الدخول',
                        'data' => null,
                    ], 401);
                }

                $statusCode = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500;

                // For ValidationException that somehow slipped through
                if (method_exists($e, 'status')) {
                    $statusCode = $e->status;
                }

                $message = $e->getMessage();
                if (empty($message)) {
                    $message = 'خطأ في الخادم';
                }

                return response()->json([
                    'success' => false,
                    'message' => $message,
                    'data' => config('app.debug') ? [
                        'exception' => get_class($e),
                        'file' => $e->getFile(),
                        'line' => $e->getLine(),
                        'trace' => $e->getTrace(),
                    ] : null,
                ], $statusCode == 0 ? 500 : $statusCode);
            }
        });
    })->create();
