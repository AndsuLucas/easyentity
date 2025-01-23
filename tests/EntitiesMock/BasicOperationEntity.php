<?php

declare(strict_types=1);

namespace Andsu\Tests\EntitiesMock;

use Andsu\Easyentity\Base\EasyEntity;
use Andsu\Easyentity\Behavior\Attributes\Addapt;
use Andsu\Easyentity\Behavior\Attributes\Cast;
use Andsu\Easyentity\Behavior\Attributes\CastWithMethod;

class BasicOperationEntity extends EasyEntity
{
    protected array $addaptIndex = [
        'Id' => 'id',
        'age_val' => 'age',
        'nome' => 'name',
        'address_id' => 'addressId',
        'idade' => 'age',
        'some_value_object' => 'someValueObject',
    ];

    /**
     * doc block
     * @ignoreBehavior AvoidPropertyInitialization
     */
    #[Cast('intval')]
    protected int $id;

    /**
     * test doc block
     * a b c 1 2 3
     */
    #[Cast('intval')]
    protected int $age;

    protected string $name;

    protected int $addressId;

    #[CastWithMethod('castSomeValueObject')]
    protected object $someValueObject;

    /**
     * @param array<mixed, mixed> $value
     */
    protected function castSomeValueObject(array $value): object
    {
        return (object) $value;
    }
}
