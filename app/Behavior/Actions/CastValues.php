<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Actions;

use Andsu\Easyentity\Behavior\Attributes\CastWithMethod;
use ReflectionProperty;
use Andsu\Easyentity\Behavior\Attributes\Cast;

trait CastValues
{
    protected function castValue(string $propName, mixed $valueToCast): mixed
    {
        if (!property_exists($this, $propName)) {
            return $valueToCast;
        }

        $prop = new ReflectionProperty($this, $propName);

        $attributes = $prop->getAttributes(Cast::class);
        if (empty($attributes)) {
            return $this->castWithMethod($prop, $valueToCast);
        }

        /** @var Cast $castAttribute */
        $castAttribute = array_pop($attributes)
            ->newInstance();

        return $castAttribute->cast($valueToCast);
    }

    protected function castWithMethod(ReflectionProperty $prop, mixed $valueToCast): mixed
    {
        $attributes = $prop->getAttributes(CastWithMethod::class);

        if (empty($attributes)) {
            return $valueToCast;
        }

        /** @var CastWithMethod $castAttribute */
        $castAttribute = array_pop($attributes)
                ->newInstance();
        echo 'oassi';
        return $castAttribute->cast($this, $valueToCast);
    }
}
