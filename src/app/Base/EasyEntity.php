<?php

declare(strict_types=1);

namespace Andsu\Easyentity\Base;

abstract class EasyEntity implements IEasyEntity
{
    public function __construct(array $data = [])
    {
        if (!empty($data)) {
            $this->fill($data);
        }
    }

    protected function fill(array $data): void
    {
        foreach ($data as $propName => $propValue) {
            $propName = strtolower($propName);
            $this->$propName = $propValue;
        }
    }

    public function __get(string $propName): mixed
    {
        try {
            if (!property_exists($this, $propName)) {
                return null;
            }
            
            return $this->$propName;  
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function __set(mixed $propName, mixed $propValue): void
    {
        $this->$propName = $propValue;
    }
}
