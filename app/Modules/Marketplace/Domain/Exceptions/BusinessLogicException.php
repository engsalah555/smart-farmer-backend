<?php

namespace App\Modules\Marketplace\Domain\Exceptions;

class BusinessLogicException extends MarketplaceException
{
    public function __construct(string $message = "حدث خطأ في منطق العمل")
    {
        parent::__construct($message, 422);
    }
}
