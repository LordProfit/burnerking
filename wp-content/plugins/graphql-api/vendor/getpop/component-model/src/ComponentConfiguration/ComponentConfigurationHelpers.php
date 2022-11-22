<?php

declare (strict_types=1);
namespace PoP\ComponentModel\ComponentConfiguration;

/**
 * Helpers for the ComponentConfiguration class
 */
class ComponentConfigurationHelpers
{
    public static function getHookName(string $class, string $envVariable) : string
    {
        return \sprintf('%s:configuration:%s', $class, $envVariable);
    }
}
