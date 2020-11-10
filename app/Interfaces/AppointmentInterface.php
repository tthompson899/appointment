<?php

namespace App\Interfaces;

interface AppointmentInterface
{
    public function index(array $params);

    public function create(array $params);

    public function update(int $id, array $params);

    public function delete($id);
}
