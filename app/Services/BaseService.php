<?php

namespace App\Services;

use App\Interfaces\BaseServiceInterface;

class BaseService implements BaseServiceInterface
{
    protected $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $repository = $this->getById($id);

        return $repository->update($attributes);
    }

    public function delete($id)
    {
        $repository = $this->getById($id);

        return $repository->delete();
    }
}
