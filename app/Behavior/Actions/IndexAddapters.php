<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Actions;

use ReflectionClass;
use Andsu\Easyentity\Behavior\Attributes\Addapt;

trait IndexAddapters
{
    protected function indexAdapters(): void
    {
        if (!empty($this->addaptIndex)) {
            return;
        }

        $entity = new ReflectionClass($this);
        $properties = $entity->getProperties();

        if (empty($properties)) {
            return;
        }

        foreach ($properties as $property) {
            $addapters = $property->getAttributes(Addapt::class);
            if (empty($addapters)) {
                continue;
            }

            $addapter = array_pop($addapters);
            $addapter = $addapter->newInstance();
            $fieldsToAddapt = $addapter->getTargetPropNameByFieldToAddapt($property->getName());

            $this->addaptIndex = [
                ...$this->addaptIndex,
                ...$fieldsToAddapt
            ];
        }
    }

}