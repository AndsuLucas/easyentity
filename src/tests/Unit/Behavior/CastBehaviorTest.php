<?php

use Andsu\Tests\Unit\EntitiesMock\BasicOperationEntity;

describe('Cast entity behaviors', function() {
    it('should cast data based on cast behavior', function($data, $expectedId, $expectedName, $expectedAge) {
        $userEntity = new BasicOperationEntity($data);

        expect($userEntity->id)->toBe($expectedId);
        expect($userEntity->name)->toBe($expectedName);
        expect($userEntity->age)->toBe($expectedAge);
    })->with('cast_data_set');

    it('should cast data based on cast behavior when not use fill', function() {
        $userEntity = new BasicOperationEntity();
        $userEntity->id = '1';
        expect($userEntity->id)->toBe(1);
    });

    it('should cast data baed on cast with method', function () {
        $userEntity = new BasicOperationEntity(['some_value_object' => ['name' => 'some name']]);
        expect($userEntity->someValueObject)->toBeObject();
        expect($userEntity->someValueObject->name)->toBe('some name');
    })->group('cast');
});


dataset('cast_data_set', [
    [['id' => '1', 'name' => 'cool name',  'age' => '24',], 1, 'cool name', 24],
]);
