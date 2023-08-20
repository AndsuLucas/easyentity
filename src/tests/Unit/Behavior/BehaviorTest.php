<?php

use Andsu\Tests\Unit\EntitiesMock\BasicOperationEntity;

describe('Basic Entity behaviors', function() {
    it('should return null when entity property was not initialized and has prevent initialized behavior', function() {
        $userEntity = new BasicOperationEntity();
        expect($userEntity->name)->toBeNull();
        expect($userEntity->age)->toBeNull();
    });

    it('should not set inexistent properties', function() {
        $basicEntity = new BasicOperationEntity([
            'Inexistent' => 1,
        ]);
        
        expect($basicEntity->Inexistent)->toBeNull();
    });
});
