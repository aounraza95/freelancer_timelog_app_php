<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CookiesTrait;
use App\Models\TimelogsModel;
use App\Models\TaskssModel;
use Illuminate\Support\Facades\Validator;

class TimelogsController extends Controller
{
    //
    use CookiesTrait;

    public function __construct()
    {
        if (!$this->hasCookie('user')) {
            return redirect()->to('/checkin')->send();
        }
    }
    //
    public function index(Request $request)
    {
        $timeloglist = TimelogsModel::all();
        return view('Timelog.index', compact('timeloglist'));
    }

    public function createTimelog(Request $request)
    {
        $taskslist = TaskssModel::all();
        return view('Timelog.create', compact('taskslist'));
    }

    public function submitCreateTimelog(Request $request)
    {
        $rules = [
            'start_time' => '',
            'task_id' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/timelog/create')->withInput()->withErrors($validator);
        } else {
            $userId = json_decode($this->getCookie('user'))->id;
            $project = $request->input();

            $newTask = new TaskssModel();
            $newTask->task_name = $project['task_name'];
            $newTask->status = $project['status'];
            $newTask->project_id = $project['project'];
            $newTask->user_id = $userId;
            if ($newTask->save()) {
                return redirect()->back()->with(['msg' => "New timelog added."]);
            } else {
                return redirect('/timelog/create')->withErrors(['msg' => 'Error occured while creating new timelog.']);
            }
        }
    }
}
