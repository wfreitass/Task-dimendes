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
        // return $this->task->all();
        return $this->task->with(['userCreate', 'userResponse'])->orderBy('created_at', 'desc')->paginate(10);
    }

    public function getById($id)
    {
        return $this->task->with(['userCreate', 'userResponse'])->findOrFail($id);
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

    public function search($paramenter)
    {
        return $this->task->where('title', 'like', '%' . $paramenter . '%')->paginate(10);
    }

    public function filter($paramenter)
    {
        switch ($paramenter) {
            case '1':
                return $this->task->with(['userCreate', 'userResponse'])->orderBy('title', 'asc')->paginate(10);
                break;
            case '2':
                return $this->task->with(['userCreate', 'userResponse'])->orderBy('created_at', 'asc')->paginate(10);
                break;
            default:
                return $this->getAll();
                break;
        }
    }
}
