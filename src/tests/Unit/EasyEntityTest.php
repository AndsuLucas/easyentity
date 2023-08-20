<?php

use Andsu\Tests\Unit\EntitiesMock\BasicOperationEntity;

describe('Basic operations of entity', function() {
    it('should fill the entity with corresponding data', function ($data, $expectedId, $expectedName, $expectedAge) {
        $userEntity = new BasicOperationEntity($data);

        expect($userEntity->id)->toBe($expectedId);
        expect($userEntity->name)->toBe($expectedName);
        expect($userEntity->age)->toBe($expectedAge);
    })->with('user_fake_entity_data_set');

    it('should return Error when entity property was not initialized and has not prevent initialized behavior', function() {
        $userEntity = new BasicOperationEntity();

        try {
            $userEntity->id;
            throw new Exception('Fail to return error');
        } catch (\Throwable $th) {
            expect($th->getMessage())->toMatch('/Typed property .*::\$id must not be accessed before initialization/');
        }
    });
    
    it('should set correctly', function () {
        $userEntity = new BasicOperationEntity();
        $userEntity->name = 'Anderson Oliveira';
        $userEntity->age = 24;
        $userEntity->id = 2;

        expect($userEntity)->toHaveProperty('name', 'Anderson Oliveira');
        expect($userEntity)->toHaveProperty('age', 24);
        expect($userEntity)->toHaveProperty('id', 2);
    });

    it ('should throw type exception when is tried to set property withut valid type and property has not cast assign behavior', function () {
        $userEntity = new BasicOperationEntity();
        try {
            $userEntity->name = 12;
            throw new Exception('Fail to return error');
        } catch (\Throwable $th) {
            expect($th->getMessage())->toMatch('/Cannot assign int to property/');
        }
    });
});

dataset('user_fake_entity_data_set', [
    [['id' => 1, 'name' => 'cool name',  'age' => 24,], 1, 'cool name', 24],
    [['Id' => 1, 'Name' => 'Cool name',  'Age' => 24,], 1, 'Cool name', 24]
]);
