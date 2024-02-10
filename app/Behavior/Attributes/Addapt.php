<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Behavior\Attributes;

use Attribute;

#[Attribute]
class Addapt
{
    /**
     * @param array<string, string> $fieldsToAddapt
     */
    public function __construct(private readonly array $fieldsToAddapt)
    {
    }

    /**
     * @return array<string, string>
     */
    public function getTargetPropNameByFieldToAddapt(string $propName): array
    {
        $fieldIndex = [];
        foreach ($this->fieldsToAddapt as $field) {
            $fieldIndex[$field] = $propName;
        }

        return $fieldIndex;
    }
}
