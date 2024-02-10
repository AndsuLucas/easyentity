<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Attributes;

use Attribute;
use InvalidArgumentException;

#[Attribute]
class Cast
{
    public function __construct(private readonly string $casting)
    {
    }

    public function cast(mixed $valueToCast): mixed
    {
        if (!function_exists($this->casting)) {
            throw new InvalidArgumentException("The casting function '{$this->casting}' does not exist");
        }

        $functionName = $this->casting;
        $callable = fn ($value) => $functionName($value);
        return call_user_func($callable, $valueToCast);
    }
}
