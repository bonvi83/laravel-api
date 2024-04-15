<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::select(['id', 'user_id', 'category_id', 'title', 'content', 'image', 'slug'])
        ->with(['category:id,lable,color', 'tecnologies:id,lable,color'])
        ->orderBy('created_at', 'DESC')
        ->paginate();

        foreach($projects as $project) {
            $project->image = !empty($project->image) ? asset('/storage/' . $project->image) : null;
            $project->content = $project->getAbstract(45);
        };

        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $project = Project::select(['id', 'user_id', 'category_id', 'title', 'content', 'image', 'slug'])
        ->with(['category:id,lable,color', 'tecnologies:id,lable,color'])
        ->first();

        $project->image = !empty($project->image) ? asset('/storage/' . $project->image) : null;
        $project->content = $project->getAbstract(45);

        return response()->json($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
