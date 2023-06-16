<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        $this->model->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
            'role_id' => 2
        ]);
        if($user) {
            // enviar email
        }
    }
}