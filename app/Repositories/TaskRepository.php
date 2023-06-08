<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getAll()
    {
        return $this->task->all();
        // return $this->task->with('prompts')->get();
    }

    public function getById($id)
    {
        return $this->task->with('prompts')->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->task->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $task = $this->getById($id);

        return $task->update($attributes);
    }

    public function delete($id)
    {
        $task = $this->getById($id);

        return $task->delete();
    }
}
