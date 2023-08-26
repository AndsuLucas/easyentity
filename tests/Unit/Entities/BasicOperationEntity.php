<?php

declare(strict_types=1);

namespace Andsu\Tests\Unit\Entities;

use Andsu\Easyentity\Base\EasyEntity;

class BasicOperationEntity extends EasyEntity
{
    protected int $id;

    protected int $age;

    protected string $name;
}