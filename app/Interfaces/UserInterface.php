<?php

namespace App\Interfaces;

interface UserInterface
{
    public function index();

    public function create($user);

    public function update($id, $user);

    public function delete($id);
}
