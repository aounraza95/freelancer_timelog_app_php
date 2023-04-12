<?php

namespace App\Http\Controllers;

use App\Models\ProjectsModel;
use App\Models\TaskssModel;
use Illuminate\Http\Request;
use App\Traits\CookiesTrait;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class HomeController extends Controller
{
	use CookiesTrait;
	public function __construct()
	{
		if (!$this->hasCookie('user')) {
			return redirect()->to('/checkin')->send();
		}
	}

	public function getUserInfo()
	{
		$userInfo = $this->getCookie('user');
		dd($userInfo);
	}

	public function dashboard(Request $request)
	{
		// $useStats = DB::table('projects')->join('tasks', 'projects.id', '=', 'tasks.project_id')->get();
		$largerStats['projects'] = ProjectsModel::count();
		$largerStats['tasks'] = TaskssModel::count();
		// 
		// $projectsStats = ProjectsModel::with(['tasks', function($query) {
		// 	$query->withCount('timelogs');
		// }])->get();

		$projectsStats = ProjectsModel::with('tasks')->with('tasks.timelogs')->get();
		$stats = [];
		foreach ($projectsStats as $project) {
			$stats['tasks'][] = count($project->tasks);
			$stats['title'][] = $project->project_name;
		}
		// dd($stats);
		return view('Layout.userstats', compact('largerStats', 'stats'));
	}
}
