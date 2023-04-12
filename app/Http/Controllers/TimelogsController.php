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
        $timeloglist = TimelogsModel::with('tasks')->get();
        return view('Timelog.index', compact('timeloglist'));
    }

    public function createTimelog(Request $request)
    {
        $taskslist = TaskssModel::all();
        return view('Timelog.create', compact('taskslist'));
    }

    public function submitCreateTimelog(Request $request)
    {
        // dd($request->all());
        $rules = [
            'start_time' => 'required|string|max:255',
            'task_id' => 'required|string|max:255'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('/timelog/create')->withInput()->withErrors($validator);
        } else {
            $userId = json_decode($this->getCookie('user'))->id;
            $project = $request->input();

            $newTimelog = new TimelogsModel();
            $newTimelog->start_datetime = $project['start_time'];
            $newTimelog->task_id = $project['task_id'];
            $newTimelog->end_datetime = $project['end_time'];
            $newTimelog->user_id = $userId;
            if ($newTimelog->save()) {
                return redirect()->back()->with(['msg' => "New timelog added."]);
            } else {
                return redirect('/timelog/create')->withErrors(['msg' => 'Error occured while creating new timelog.']);
            }
        }
    }
}
