<?php

namespace App\GraphQL\Type;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQl;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'um type de usuario',
        'model' => User::class
    ];

    public function fields()
    {
        return [
            'id' => [ 
                'type' => Type::nonNull(Type::ID()),
                'desciption' => 'o id do usuario no banco de dados'
            ],
            'name' => [ 
                'type' => Type::string(),
                'desciption' => 'o id do usuario no banco de dados'
            ],  
            'email' => [ 
                'type' => Type::string(),
                'desciption' => 'o id do usuario no banco de dados'
            ],
            'posts' =>[
                'type' => Type::listOf(GraphQL::type('post_type')),
                'descritption'=> 'post por usuarios'
            ]
        ];
    }
}