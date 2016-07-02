<?php

namespace App\Support\Files;

class PathDiscovery
{
    public static function definingDirectory($classInstance)
    {
        $reflection = new \ReflectionClass($classInstance);

        return dirname($reflection->getFileName());
    }
}
