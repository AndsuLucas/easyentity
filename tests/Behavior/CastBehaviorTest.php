<?php

declare(strict_types=1);

namespace Andsu\Tests\Behavior;

use Andsu\Tests\EntitiesMock\BasicOperationEntity;
use PHPUnit\Framework\TestCase;

/**
 * @group behavior
 */
class CastBehaviorTest extends TestCase
{
    public function testShouldCastDataBasedOnCastBehavior()
    {
        $data = [
            'id' => '1',
            'name' => 'cool name',
            'age' => '24',
        ];

        $expectedId = 1;
        $expectedName = 'cool name';
        $expectedAge = 24;

        $userEntity = new BasicOperationEntity($data);

        $this->assertEquals($expectedId, $userEntity->id);
        $this->assertEquals($expectedName, $userEntity->name);
        $this->assertEquals($expectedAge, $userEntity->age);
    }

    public function testShouldCastDataBasedOnCastBehaviorWhenNotUseFill()
    {
        $userEntity = new BasicOperationEntity();
        $userEntity->id = '1'; // this is not good. Maybe change this cast behavior
        $this->assertEquals(1, $userEntity->id);
    }

    public function testShouldCastDataBasedOnCastWithMethod()
    {
        $userEntity = new BasicOperationEntity(['some_value_object' => ['name' => 'some name']]);
        $this->assertIsObject($userEntity->someValueObject);
        $this->assertEquals('some name', $userEntity->someValueObject->name);
    }
}
