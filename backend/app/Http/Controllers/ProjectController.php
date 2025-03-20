<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(ProjectResource::collection(Project::all()), Response::HTTP_OK);
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());
        return response()->json(new ProjectResource($project), Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        return response()->json(new ProjectResource($project), Response::HTTP_OK);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return response()->json(new ProjectResource($project), Response::HTTP_OK);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(['message' => 'Proyecto eliminado'], Response::HTTP_OK);
    }
}
