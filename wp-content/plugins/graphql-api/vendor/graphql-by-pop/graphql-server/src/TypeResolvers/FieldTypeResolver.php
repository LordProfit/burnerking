<?php

declare (strict_types=1);
namespace GraphQLByPoP\GraphQLServer\TypeResolvers;

use GraphQLByPoP\GraphQLServer\TypeResolvers\AbstractIntrospectionTypeResolver;
use GraphQLByPoP\GraphQLServer\TypeDataLoaders\SchemaDefinitionReferenceTypeDataLoader;
class FieldTypeResolver extends AbstractIntrospectionTypeResolver
{
    public function getTypeName() : string
    {
        return '__Field';
    }
    public function getSchemaTypeDescription() : ?string
    {
        return $this->translationAPI->__('Representation of a GraphQL type\'s field', 'graphql-server');
    }
    /**
     * @return string|int|null
     * @param object $resultItem
     */
    public function getID($resultItem)
    {
        $field = $resultItem;
        return $field->getID();
    }
    public function getTypeDataLoaderClass() : string
    {
        return SchemaDefinitionReferenceTypeDataLoader::class;
    }
}
