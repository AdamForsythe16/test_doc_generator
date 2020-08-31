<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Project;
use App\Models\TestData;
use App\Http\Requests\StoreTest;
use App\Http\Requests\StoreTestData;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    public function index() {
        return view('tests.index');
    }

    public function create(Project $project) {
        $data = [
            'title' => 'Create new test',
            'url' => 'projects/'.$project->id.'/tests/store',
            'method' => 'POST'
        ];

        return view('tests.create', ['data' => $data]);
    }

    public function store(StoreTest $request, Project $project, Test $test) {

        $data = [
            'name' => $request->name,
            'project_id' => $project->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        $id = $test->createTest($data);

        return redirect('projects/'.$project->id.'/tests/'.$id);
    }

    public function show(Project $project, Test $test, TestData $testData) {

        $data = [
            'title' => 'Create test data',
            'test' => $test,
            'test_data' => $testData->getItems($test->id),
            'method' => 'POST',
            'url' => 'projects/'.$project->id.'/tests/'.$test->id.'/store',
        ];

        return view('tests.show', ['data' => $data]);
    }

    public function storeTestData(Request $request, TestData $testData) {

        try {

            DB::transaction(function() use ($request, $testData) {

                $testData->storeTestData($request);
            });
        } catch(\Exception $e) {

            return redirect()->back();
        }

        return redirect('/projects/'.$request->project.'/tests/'.$request->test);
    }
}
