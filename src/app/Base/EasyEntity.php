<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Base;

use Andsu\Easyentity\Behavior\Actions\AvoidPropertyInitialization;
use Andsu\Easyentity\Behavior\Actions\IndexAddapters;
use Andsu\Easyentity\Behavior\Actions\SetValues;

abstract class EasyEntity implements IEasyEntity
{
    protected array $addaptIndex = [];

    use AvoidPropertyInitialization,
        IndexAddapters,
        SetValues;

    public function __construct(array $data = [])
    {
        $this->indexAdapters();

        if (!empty($data)) {
            $this->fill($data);
        }
    }

    protected function fill(array $data): void
    {
        foreach ($data as $propName => $propValue) {
            $propName = strtolower($propName);
            $this->$propName = $propValue;
        }
    }

    public function __get(string $propName): mixed
    {
        if (!property_exists($this, $propName)) {
            return null;
        }

        return $this->get($propName);
    }
}
