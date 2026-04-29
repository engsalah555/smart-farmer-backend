<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;

trait ApiResponder
{
    /**
     * Return a success JSON response.
     */
    protected function success(mixed $data = null, ?string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Return an error JSON response.
     */
    protected function error(?string $message = null, int $code = 400, mixed $data = null): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * Return a paginated success response.
     */
    protected function paginated(LengthAwarePaginator $paginated, string $resourceClass, ?string $message = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $resourceClass::collection($paginated->items()),
            'meta' => [
                'current_page' => $paginated->currentPage(),
                'last_page' => $paginated->lastPage(),
                'per_page' => $paginated->perPage(),
                'total' => $paginated->total(),
            ],
        ]);
    }
}
