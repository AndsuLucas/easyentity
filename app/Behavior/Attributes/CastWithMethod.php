<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Attributes;

use Andsu\Easyentity\Base\IEasyEntity;
use Attribute;
use Closure;
use ReflectionMethod;

#[Attribute]
class CastWithMethod
{
    public function __construct(private readonly string $casting)
    {
    }

    public function cast(IEasyEntity $callerInstance, mixed $valueToCast): mixed
    {
        $method = $this->casting;
        $refMethod = new ReflectionMethod($callerInstance, $method);
        $refMethod->setAccessible(true);
        return $refMethod->invoke($callerInstance, $valueToCast);
    }
}
