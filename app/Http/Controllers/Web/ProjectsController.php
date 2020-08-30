<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\StoreProject;
use Carbon\Carbon;

class ProjectsController extends Controller
{
    public function index() {

        return view('projects.index');

    }

    public function create() {

        $data = [
            'title' => 'Create new project',
            'url' => '/projects/store',
            'method' => `POST`
        ];

        return view('projects.create', ['data' => $data]);

    }

    public function show(Project $project) {

        return view('projects.show', compact('project'));
    }

    public function store(StoreProject $request, Project $project) {

        $data = [
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $id = $project->createProject($data);
        return redirect('projects/'.$id.'/create');
    }
}
