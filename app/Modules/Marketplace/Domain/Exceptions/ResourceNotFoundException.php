<?php

namespace App\Modules\Marketplace\Domain\Exceptions;

class ResourceNotFoundException extends MarketplaceException
{
    public function __construct(string $resource = 'المورد')
    {
        parent::__construct("{$resource} غير موجود", 404);
    }
}
