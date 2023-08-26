<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Attributes;

use Attribute;

#[Attribute]
class Addapt
{
    
    public function __construct(private readonly array $fieldsToAddapt){}

    public function getTargetPropNameByFieldToAddapt(string $propName): array
    {
        $fieldIndex = [];
        foreach ($this->fieldsToAddapt as $field) {
            $fieldIndex[$field] = $propName;
        }

        return $fieldIndex;
    }
}