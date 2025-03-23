<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
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

    /**
     * Listar los colaboradores del proyecto.
     *
     * GET /projects/{project}/collaborators
     */
    public function getCollaborators(Project $project)
    {
        $collaborators = $project->collaborators()->get();
        return response()->json([
            'collaborators' => $collaborators
        ], Response::HTTP_OK);
    }

    /**
     * Asignar un colaborador al proyecto.
     *
     * POST /projects/{project}/collaborators
     *
     * Se espera un parámetro 'user_id' en el request.
     */
    public function addCollaborator(Request $request, Project $project)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        // Evitamos duplicados usando syncWithoutDetaching
        $project->collaborators()->syncWithoutDetaching($request->user_id);

        return response()->json([
            'message'       => 'Colaborador asignado exitosamente.',
            'collaborators' => $project->collaborators()->get()
        ], Response::HTTP_OK);
    }

    /**
     * Remover un colaborador del proyecto.
     *
     * DELETE /projects/{project}/collaborators/{user}
     */
    public function removeCollaborator(Project $project, User $user)
    {
        $project->collaborators()->detach($user->id);
        return response()->json([
            'message'       => 'Colaborador removido exitosamente.',
            'collaborators' => $project->collaborators()->get()
        ], Response::HTTP_OK);
    }
}
