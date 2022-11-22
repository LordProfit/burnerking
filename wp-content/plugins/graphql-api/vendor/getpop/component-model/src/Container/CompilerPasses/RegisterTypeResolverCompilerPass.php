<?php

declare (strict_types=1);
namespace PoP\ComponentModel\Container\CompilerPasses;

use PoP\ComponentModel\ComponentConfiguration;
use PoP\ComponentModel\TypeResolvers\TypeResolverInterface;
use PoP\ComponentModel\Registries\TypeRegistryInterface;
use PoP\Root\Container\CompilerPasses\AbstractInjectServiceIntoRegistryCompilerPass;
class RegisterTypeResolverCompilerPass extends AbstractInjectServiceIntoRegistryCompilerPass
{
    protected function getRegistryServiceDefinition() : string
    {
        return TypeRegistryInterface::class;
    }
    protected function getServiceClass() : string
    {
        return TypeResolverInterface::class;
    }
    protected function getRegistryMethodCallName() : string
    {
        return 'addTypeResolver';
    }
    protected function enabled() : bool
    {
        return ComponentConfiguration::enableSchemaEntityRegistries();
    }
}
