<?php

namespace App\Contracts\Dao\Task;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface TaskDaoInterface
{
    /**
     * To get task list
     * @return taskList
     */
    public function getTaskList();

    /**
     * To save task
     * @param object $request Validated values from request
     * @return Object created task object
     */
    public function addTask($request);

    /**
     * To delete task
     * @param string $id task id
     * @return string $message message success or not
     */
    public function deleteTask($id);
}