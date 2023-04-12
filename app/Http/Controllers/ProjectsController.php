<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ProjectsModel;
use App\Traits\CookiesTrait;

class ProjectsController extends Controller
{
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
		$projectlist = ProjectsModel::all();
		return view('Projects.index', compact('projectlist'));
	}

	public function createProject(Request $request)
	{
		return view('Projects.create');
	}

	public function submitCreateProject(Request $request)
	{
		$rules = [
			'project_name' => 'required|string|max:255',
			'status' => 'required|string|max:255'
		];
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect('/projects/create')->withInput()->withErrors($validator);
		} else {
			$userId = json_decode($this->getCookie('user'))->id;
			$project = $request->input();

			$newProject = new ProjectsModel();
			$newProject->project_name = $project['project_name'];
			$newProject->status = $project['status'];
			$newProject->user_id = $userId;
			if ($newProject->save()) {
				return redirect()->back()->with(['msg' => "New project added."]);
			} else {
				return redirect('/projects/create')->withErrors(['msg' => 'Error occured while creating new project.']);
			}
		}
	}
}
