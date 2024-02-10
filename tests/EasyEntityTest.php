<?php

declare(strict_types=1);

namespace Andsu\Tests;

use Andsu\Tests\EntitiesMock\BasicOperationEntity;
use PHPUnit\Framework\TestCase;

/**
 * @group behavior
 */
class EasyEntityTest extends TestCase
{
    public function testShouldFillTheEntityWithCorrespondingData()
    {
        $userEntity = new BasicOperationEntity([
            'id' => 1,
            'name' => 'cool name',
            'age' => 24,
        ]);

        $this->assertEquals(1, $userEntity->id);
        $this->assertEquals('cool name', $userEntity->name);
        $this->assertEquals(24, $userEntity->age);
    }

    public function testShouldReturnErrorWhenEntityPropertyWasNotInitializedAndHasNotPreventInitializedBehavior()
    {
        $userEntity = new BasicOperationEntity();

        try {
            $userEntity->id;
            $this->fail('Fail to return error');
        } catch (\Throwable $th) {
            $this->assertMatchesRegularExpression(
                '/Typed property .*::\$id must not be accessed before initialization/',
                $th->getMessage()
            );
        }
    }

    public function testShouldSetCorrectly()
    {
        $userEntity = new BasicOperationEntity();
        $userEntity->name = 'Anderson Oliveira';
        $userEntity->age = 24;
        $userEntity->id = 2;

        $this->assertEquals('Anderson Oliveira', $userEntity->name);
        $this->assertEquals(24, $userEntity->age);
        $this->assertEquals(2, $userEntity->id);
    }

    public function testShouldThrowAnExceptionWhenHasntAvoidPropertyInit()
    {
        $userEntity = new BasicOperationEntity();
        try {
            $userEntity->name = 12;
            $this->fail('Fail to return error');
        } catch (\Throwable $th) {
            $this->assertMatchesRegularExpression('/Cannot assign int to property/', $th->getMessage());
        }
    }
}
