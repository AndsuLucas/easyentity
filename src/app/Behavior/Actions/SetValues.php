<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Actions;

trait SetValues
{
    public function __set(mixed $propName, mixed $propValue): void
    {
        if (property_exists($this, $propName)) {
            $this->$propName = $this->castValue($propName, $propValue);
            return;
        }

        $prop = $this->getProperlyPropNameByAdaptAttribute(strval($propName));

        if (!$prop) {
            return;
        }

        $this->$prop = $this->castValue($prop, $propValue);

    }

    private function getProperlyPropNameByAdaptAttribute(string $propName): string
    {
       return  $this->addaptIndex[$propName] ?? '';
    }
}