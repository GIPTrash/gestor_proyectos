<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(Project::all(), Response::HTTP_OK);
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());
        return response()->json($project, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($project, Response::HTTP_OK);
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $project->update($request->validated());
        return response()->json($project, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return response()->json(['message' => 'Proyecto no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $project->delete();
        return response()->json(['message' => 'Proyecto eliminado'], Response::HTTP_OK);
    }
}
