<?php

use Andsu\Tests\Unit\EntitiesMock\BasicOperationEntity;

describe('Addapt entity behaviors', function() {
    it('should set correctly by adaptative setter', function (){
        $basicEntity = new BasicOperationEntity([
            'Id' => 1,
            'age_val' => 24,
            'nome' => 'Anderson Lucas',
            'address_id' => 2
        ]);

        expect($basicEntity)->toHaveProperty('id', 1);
        expect($basicEntity)->toHaveProperty('age', 24);
        expect($basicEntity)->toHaveProperty('name', 'Anderson Lucas');
        expect($basicEntity)->toHaveProperty('addressId', 2);
    });

    it('should set correctly by adaptative setter when addapt with multiples patterns', function (){
        $basicEntity = new BasicOperationEntity([
            'idade' => 24
        ]);

        expect($basicEntity)->toHaveProperty('age', 24);
    });

    it('should indexing addapters correclty', function () {
        $basicEntity = new BasicOperationEntity();
        $property = new ReflectionProperty($basicEntity, 'addaptIndex');
        $property->setAccessible(true);
        $propertyValue = $property->getValue($basicEntity);

        expect($propertyValue)->toBe([
            'age_val' => 'age',
            'idade' => 'age',
            'nome' => 'name',
            'address_id' => 'addressId'
        ]);

    });
});
