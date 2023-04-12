<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskssModel;
use App\Models\ProjectsModel;
use Illuminate\Support\Facades\Validator;
use App\Traits\CookiesTrait;

class TasksController extends Controller
{
    use CookiesTrait;

    public function __construct()
	{
		if (!$this->hasCookie('user')) {
			return redirect()->to('/checkin')->send();
		}
	}
    //
    public function index(Request $request) {
        $taskslist = TaskssModel::all();
		return view('Tasks.index', compact('taskslist'));
    }

    public function createTask(Request $request) {
        $projectslist = ProjectsModel::all();
        return view('Tasks.create', compact('projectslist'));
    }

    public function submitCreateTask(Request $request) {
        $rules = [
			'task_name' => 'required|string|max:255',
			'status' => 'required|string|max:255',
            'project' => 'required|string|max:255',
		];
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect('/tasks/create')->withInput()->withErrors($validator);
		} else {
			$userId = json_decode($this->getCookie('user'))->id;
			$project = $request->input();

			$newTask = new TaskssModel();
			$newTask->task_name = $project['task_name'];
			$newTask->status = $project['status'];
			$newTask->project_id = $project['project'];
            $newTask->user_id = $userId;
			if ($newTask->save()) {
				return redirect()->back()->with(['msg' => "New task added."]);
			} else {
				return redirect('/tasks/create')->withErrors(['msg' => 'Error occured while creating new task.']);
			}
		}
    }
}
