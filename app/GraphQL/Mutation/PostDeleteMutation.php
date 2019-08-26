<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use App\Post;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class PostDeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'PostDeleteMutation',
        'description' => 'A mutation to delete post'
    ];

    public function type()
    {
        return Type::listOf(Type::string());
    }

    public function args()
    {
        return [

        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return [];
    }
}