<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Validation\Rule;
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
        $data = $request->validate([
            'title' => 'required|string|max:150|min:1',
            'description' => 'required|string|max:3000|min:10',
            'website_link' => 'nullable|string|url|max:255',
            'source_code_link' => 'nullable|string|url|max:255',
            'proj_category' => [
                'required',
                'max:100',
                Rule::in([
                    'frontend', 'backend', 'fullstack'
                ])
            ],
            'client' => 'required|string|max:100|min:2',
            'client_category' => [
                'required',
                'max:100',
                Rule::in([
                    'food-and-beverage', 'fashion', 'tech'
                ])
            ]
        ]);

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
        $data = $request->validate([
            // 'title' => 'required|string|max:150|min:1',
            'description' => 'required|string|max:3000|min:10',
            'website_link' => 'nullable|string|url',
            'source_code_link' => 'nullable|string|url',
            'proj_category' => [
                'required',
                'max:100',
                Rule::in([
                    'frontend', 'backend', 'fullstack'
                ])
            ],
            'client' => 'required|string|max:100|min:2',
            'client_category' => [
                'required',
                'max:100',
                Rule::in([
                    'food-and-beverage', 'fashion', 'tech'
                ])
            ]
        ]);

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
