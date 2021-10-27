<?php

namespace App\Dao\Task;

use App\Models\Task;
use App\Contracts\Dao\Task\TaskDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for task
 */
class TaskDao implements TaskDaoInterface
{
    /**
     * To get task list
     * @return taskList
     */
    public function getTaskList() {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return $tasks;
    }


    /**
     * To save task
     * @param object $request Validated values from request
     * @return Object created task object
     */
    public function addTask($request) {    
        $task = new Task;
        $task->name = $request->name;
        $task->save();    
        return $task;
    }

    /**
     * To delete task
     * @param string $id task id
     * @return string $message message success or not
     */
    public function deleteTask($id) {
        Task::findOrFail($id)->delete();
        return 'Delete Complete!';
    }
}