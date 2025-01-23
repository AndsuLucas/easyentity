<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Actions;

trait SetValues
{
    public function __set(string $propName, mixed $propValue): void
    {
        if (property_exists($this, $propName)) {
            $this->$propName = $this->castValue($propName, $propValue);
            return;
        }

        $prop = $this->addapt($propName);
        if ($prop === null) {
            return;
        }


        if (!method_exists($this, 'castValue')) {
            $this->$prop = $propValue;
            return;
        }

        $this->$prop = $this->castValue($prop, $propValue);
    }

    private function addapt(string $propName): ?string
    {
        $prop = $this->addaptIndex[$propName] ?? null;
        if (!is_string($prop)) {
            return null;
        }


        if (!property_exists($this, $prop)) {
            return null;
        }


        return $prop;
    }
}
