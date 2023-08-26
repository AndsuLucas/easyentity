<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Base;

interface IEasyEntity
{
    public function __get(string $propertyName): mixed;

    public function __set(mixed $name, mixed $value): void;
}
