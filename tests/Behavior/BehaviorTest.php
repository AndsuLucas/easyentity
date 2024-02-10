<?php

declare(strict_types=1);

namespace Andsu\Tests\Behavior;

use Andsu\Tests\EntitiesMock\BasicOperationEntity;
use PHPUnit\Framework\TestCase;

/**
 * @group behavior
 */
class BehaviorTest extends TestCase
{
    public function testShouldReturnNullWhenPropertyWasNotInitialized()
    {
        $userEntity = new BasicOperationEntity();
        $this->assertNull($userEntity->name);
        $this->assertNull($userEntity->age);
    }

    public function testShouldNotSetInexistentProperties()
    {
        $basicEntity = new BasicOperationEntity([
            'Inexistent' => 1,
        ]);

        $this->assertNull($basicEntity->Inexistent);
    }
}
