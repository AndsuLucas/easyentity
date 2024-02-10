<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Base;

use Andsu\Easyentity\Behavior\Actions\AvoidPropertyInitialization;
use Andsu\Easyentity\Behavior\Actions\CastValues;
use Andsu\Easyentity\Behavior\Actions\GetValues;
use Andsu\Easyentity\Behavior\Actions\IndexAddapters;
use Andsu\Easyentity\Behavior\Actions\SetValues;

abstract class EasyEntity implements IEasyEntity
{
    use AvoidPropertyInitialization;
    use IndexAddapters;
    use SetValues;
    use GetValues;
    use CastValues;

    /**
     * @var array<string, string>
     */
    protected array $addaptIndex = [];

    /**
     * @param array<mixed> $data
     */
    public function __construct(array $data = [])
    {
        $this->indexAdapters();

        if (!empty($data)) {
            $this->fill($data);
        }
    }

    /**
     * @param array<mixed> $data
     */
    protected function fill(array $data): void
    {
        foreach ($data as $propName => $propValue) {
            $propName = strtolower($propName);
            $this->__set($propName, $propValue);
        }
    }
}
