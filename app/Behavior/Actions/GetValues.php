<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Actions;

trait GetValues
{
    public function __get(string $propName): mixed
    {
        if (!property_exists($this, $propName)) {
            return null;
        }

        return $this->get($propName);
    }
}
