<?php

namespace App\Modules\Marketplace\Domain\Exceptions;

class UnauthorizedAccessException extends MarketplaceException
{
    public function __construct(string $message = 'غير مصرح لك بالقيام بهذا الإجراء')
    {
        parent::__construct($message, 403);
    }
}
