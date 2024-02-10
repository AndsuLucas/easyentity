<?php

declare(strict_types=1);

namespace Andsu\Tests\Behavior;

use PHPUnit\Framework\TestCase;
use Andsu\Tests\EntitiesMock\BasicOperationEntity;
use ReflectionProperty;

class AddaptBehaviorTest extends TestCase
{
    public function testShouldSetCorrectlyByAdaptativeSetter()
    {
        $basicEntity = new BasicOperationEntity([
            'Id' => 1,
            'age_val' => 24,
            'nome' => 'Anderson Lucas',
            'address_id' => 2
        ]);

        $this->assertEquals(1, $basicEntity->id);
        $this->assertEquals(24, $basicEntity->age);
        $this->assertEquals('Anderson Lucas', $basicEntity->name);
        $this->assertEquals(2, $basicEntity->addressId);
    }

    public function testShouldSetCorrectlyByAdaptativeSetterWhenAddaptWithMultiplesPatterns()
    {
        $basicEntity = new BasicOperationEntity([
            'idade' => 24
        ]);

        $this->assertEquals(24, $basicEntity->age);
    }

    public function testShouldIndexingAddaptersCorreclty()
    {
        $basicEntity = new BasicOperationEntity();
        $property = new ReflectionProperty($basicEntity, 'addaptIndex');
        $property->setAccessible(true);
        $propertyValue = $property->getValue($basicEntity);

        $this->assertEquals([
            'age_val' => 'age',
            'idade' => 'age',
            'nome' => 'name',
            'address_id' => 'addressId',
            'some_value_object' => 'someValueObject'
        ], $propertyValue);
    }
}
