<?php

namespace App\Repositories;

use App\Interfaces\UserInterface;
use App\User;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserInterface
{
    public function index()
    {
        return User::paginate(20);
    }

    public function create($user)
    {
        return User::create($user);
    }

    public function update($id, $values)
    {
        return User::where('id', $id)->update($values);
    }

    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }
}
