<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Actions;

use ReflectionProperty;

trait AvoidPropertyInitialization
{
    private const IGNORE_THIS_BEHAVIOR = '@ignoreBehavior AvoidPropertyInitialization';

    protected function get(string $propertyName): mixed
    {
        $prop = new ReflectionProperty($this, $propertyName);
        $docComment = $prop->getDocComment();

        $mustBehaveLikeThis = !is_string($docComment)
            || strpos($docComment, self::IGNORE_THIS_BEHAVIOR) === false;

        if (! $mustBehaveLikeThis) {
            return $this->$propertyName;
        }

        if (! isset($this->$propertyName)) {
            return null;
        }

        return $this->$propertyName;
    }
}
