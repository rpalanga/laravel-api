<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();


        return view("admin.projects.fake-index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view("admin.projects.create" , compact("types" , "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $request->validated();

        $newProject = new Project();

        if ($request->hasFile("image")) {
            $path = Storage::disk("public")->put("my_image", $request->image);

            $newProject->image = $path;
        }

        $newProject->fill($request->all());

        $newProject->save(); 
        
        $newProject->technologies()->attach($request->technologies);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->technologies());
        // $project= Project::find($project->id);
        return view('admin.projects.show' , compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProjectRequest $request, Project $project)
    {
        $request->validated();

        if ($request->hasFile('image')) {

            $path = Storage::disk('public')->put('my_image', $request->image);

            $project->image = $path;

        }
        
        $project->fill($request->all());

        $project->save();

        $project->technologies()->sync($request->technologies);
        
        return redirect()->route('admin.projects.show', $project->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete(); 
        return redirect()->route('admin.projects.index');
    }
}
