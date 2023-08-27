<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Attributes;

use Attribute;

#[Attribute]
class Cast
{
    public function __construct(private readonly string $casting){}

    public function cast(mixed $valueToCast): mixed
    {
        return call_user_func($this->casting, $valueToCast);
    }
}