<?php

namespace App\GraphQL\Type;
use App\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQl;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A type',
        'model' => Post::class
    ];

    public function fields()
    {
        return [
            'id' =>[
                'type' => Type::ID(),
                'description' => 'ID do Post'
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Titulo do Post'
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'Status do Post'
            ],
            'user_id' =>[
                'type' => Type::int(),
                'description' => 'user_id do Post'
            ]
            
        ];
    }
}