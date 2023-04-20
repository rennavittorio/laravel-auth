<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $project_categories = [
            'frontend' => 'frontend',
            'backend' => 'backend',
            'fullstack' => 'fullstack',
        ];

        $client_categories = [
            'food-and-beverage' => 'food and beverage',
            'fashion' => 'fashion',
            'tech' => 'tech',
        ];

        return view('projects.create', compact('project_categories', 'client_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validated(); //richiama la form request validation

        $new_proj = new Project();
        $new_proj->fill($data);
        $new_proj->slug = Str::of($data['title'])->slug();

        $new_proj->save();

        return to_route('projects.show', $new_proj->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        $project_categories = [
            'frontend' => 'frontend',
            'backend' => 'backend',
            'fullstack' => 'fullstack',
        ];

        $client_categories = [
            'food-and-beverage' => 'food and beverage',
            'fashion' => 'fashion',
            'tech' => 'tech',
        ];

        return view('projects.edit', compact('project', 'project_categories', 'client_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->update($data);

        return to_route('projects.show', $project->slug);
    }

    public function delete(Project $project)
    {
        return view('projects.delete', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('projects.index');
    }
}
