<?php

namespace App\GraphQL\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

use App\User;
use GraphQL;

class UserMutation extends Mutation
{
    protected $attributes = [
        'name' => 'UserMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQl::type('user_type');
    }

    public function args()
    {
        return [
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "nome do usuário"
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "Email do usuário"
            ],
            'password' => [
                'type' => Type::nonNull(Type::string()),
                'description' => "Senha do usuário"
            ],
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $user = User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
            'created_at' => today(),
            'updated_at' => today()
        ]);

        return $user;
    }
}