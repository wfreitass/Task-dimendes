<?php

namespace App\Services;

use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskService extends BaseService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        parent::__construct($taskRepository);
        $this->taskRepository =  $taskRepository;
    }

    public function search(string $paramenter)
    {
        // dd($this->taskRepository);
        return  $this->taskRepository->search($paramenter);
    }

    public function filter(string $paramenter)
    {
        // dd($this->taskRepository);
        return  $this->taskRepository->filter($paramenter);
    }
}
