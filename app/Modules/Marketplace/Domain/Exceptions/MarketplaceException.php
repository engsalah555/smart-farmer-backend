<?php

namespace App\Modules\Marketplace\Domain\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class MarketplaceException extends Exception
{
    protected int $statusCode;

    public function __construct(string $message = "", int $statusCode = 400)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
        ], $this->statusCode);
    }
}
