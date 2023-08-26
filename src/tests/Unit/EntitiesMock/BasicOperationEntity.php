<?php

declare(strict_types=1);

namespace Andsu\Tests\Unit\EntitiesMock;

use Andsu\Easyentity\Base\EasyEntity;
use Andsu\Easyentity\Behavior\Attributes\Addapt;
use Andsu\Easyentity\Behavior\Attributes\Cast;
use Andsu\Easyentity\Behavior\Attributes\CastWithMethod;

class BasicOperationEntity extends EasyEntity
{
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
    #[Addapt(['age_val', 'idade'])]
    #[Cast('intval')]
    protected int $age;

    #[Addapt(['nome'])]
    protected string $name;

    #[Addapt(['address_id'])]
    protected int $addressId;

    #[Addapt(['some_value_object'])]
    #[CastWithMethod('castSomeValueObject', __CLASS__)]
    protected object $someValueObject;

    protected function castSomeValueObject(array $value): object
    {
        return (object) $value;
    }
}