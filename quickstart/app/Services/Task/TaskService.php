<?php

namespace App\Services\Task;

use App\Contracts\Dao\Task\TaskDaoInterface;
use App\Contracts\Services\Task\TaskServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Service class for task.
 */
class TaskService implements TaskServiceInterface
{
    /**
     * post dao
     */
    private $taskDao;
    /**
     * Class Constructor
     * @param TaskDaoInterface
     * @return
     */
    public function __construct(TaskDaoInterface $taskDao)
    {
        $this->taskDao = $taskDao;
    }

    /**
     * To get task list
     * @return taskList
     */
    public function getTaskList() {
        return $this->taskDao->getTaskList();
    }

    /**
     * To save task
     * @param object $request $validated Validated values from request
     * @return Object created task object
     */
    public function addTask($request) {        
        return $this->taskDao->addTask($request);
    }

    /**
     * To delete task
     * @param string $id task id
     * @return string $message message success or not
     */
    public function deleteTask($id) {
        return $this->taskDao->deleteTask($id);
    }
}