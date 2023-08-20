<?php

declare(strict_types=1);

namespace Andsu\Tests\Unit\EntitiesMock;

use Andsu\Easyentity\Base\EasyEntity;
use Andsu\Easyentity\Behavior\Attributes\Addapt;

class BasicOperationEntity extends EasyEntity
{
    /** 
     * doc block
     * @ignoreBehavior AvoidPropertyInitialization 
     */
    protected int $id;

    /**
     * test doc block
     * a b c 1 2 3
     */
    #[Addapt(['age_val', 'idade'])]
    protected int $age;

    #[Addapt(['nome'])]
    protected string $name;

    #[Addapt(['address_id'])]
    protected $addressId;
}