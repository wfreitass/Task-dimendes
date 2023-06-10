<?php

namespace App\Interfaces;

interface TaskRepositoryInterface
{
    public function getAll();

    public function getById($id);

    public function create(array $attributes);

    public function update($id, array $attributes);

    public function delete($id);

    public function search($paramenter);

    public function filter($paramenter);
}
