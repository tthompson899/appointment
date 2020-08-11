<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // @var UserInterface
    // protected $users;

    public function __construct(UserInterface $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return $this->users->index();
    }

    public function create(Request $request)
    {
        $newUser = $request->only('name', 'email', 'phone', 'date_of_birth');

        $this->users->create($newUser);
    }

    public function update($userId, Request $request)
    {
        $user = $request->only('name', 'email', 'phone', 'date_of_birth');

        if (! $this->users->update($userId, $user)) {
            return 'User not updated';
        }

        return 'User has been updated.';
    }

    public function delete($userId)
    {
        return $this->users->delete($userId);
    }
}
