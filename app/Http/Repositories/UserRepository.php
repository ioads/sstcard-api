<?php

namespace App\Http\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store(array $data)
    {
        return $this->model->create([
            'name' => $data['nome_fantasia'],
            'email' => $data['email'],
            'password' => Hash::make('123456'),
            'role_id' => 2
        ]);
    }
}