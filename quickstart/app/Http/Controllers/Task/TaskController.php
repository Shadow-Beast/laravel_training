<?php

namespace App\Http\Controllers\Task;

use App\Contracts\Services\Task\TaskServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * This is Task controller.
 */
class TaskController extends Controller
{
    /**
     * task interface
     */
    private $taskInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskServiceInterface $taskServiceInterface)
    {
        $this->taskInterface = $taskServiceInterface;
    }

    /**
     * To show task list
     *
     * @return View task list
     */
    public function showTaskList()
    {
        $taskList = $this->taskInterface->getTaskList();
        return view('tasks', [
            'tasks' => $taskList
        ]);
    }

    /**
     * To add task
     * @param Request $request
     * @return View task list
     */
    public function addTask(Request $request) {
        $task = $this->taskInterface->addTask($request);
        return redirect('/');
    }

    /**
     * To delete task
     * @param sting $id
     * @return View task list
     */
    public function deleteTask($id) {
        $this->taskInterface->deleteTask($id);
        return redirect('/');
    }
}