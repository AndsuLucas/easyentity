<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Attributes;

use Andsu\Easyentity\Base\IEasyEntity;
use Attribute;
use Closure;

#[Attribute]
class CastWithMethod
{
    public function __construct(private readonly string $casting, private  readonly string $callerName){}

    public function cast(IEasyEntity $callerInstance, mixed $valueToCast): mixed
    {
        $method = $this->casting;
        $callerName = $this->callerName;

        return Closure::bind(
            fn () => $this->$method($valueToCast),
            $callerInstance,
            $callerName
        )();
    }
}