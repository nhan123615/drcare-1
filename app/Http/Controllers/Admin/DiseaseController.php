<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disease;
use App\Models\DiseaseType;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = Disease::all();
        return view('admin.disease.show',compact('diseases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $types = DiseaseType::all();
        return view('admin.disease.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' =>'required',
            'type' =>'required',
            'description' =>'required',
            'statistics' =>'required',
            'causes' =>'required',
            'symptoms' =>'required',
            'preventions' =>'required',
        ]);

        $disease = new Disease;
        $disease->disease_type_id = $request->type;
        $disease->name = $request->name;
        $disease->description = $request->description;
        $disease->statistics = $request->statistics;
        $disease->causes = $request->causes;
        $disease->symptoms = $request->symptoms;
        $disease->preventions = $request->preventions;
        $disease->save();
        return redirect(route('disease.index'))->with('message', 'Insert Successfull !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disease = Disease::where('id', $id)->first();
        $types = DiseaseType::all();
        return view('admin.disease.edit',compact('disease','types'));
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
        $this->validate($request,[
            'name' =>'required',
            'type' =>'required',
            'description' =>'required',
            'statistics' =>'required',
            'causes' =>'required',
            'symptoms' =>'required',
            'preventions' =>'required',
        ]);

        $disease = Disease::find($id);
        $disease->disease_type_id = $request->type;
        $disease->name = $request->name;
        $disease->description = $request->description;
        $disease->statistics = $request->statistics;
        $disease->causes = $request->causes;
        $disease->symptoms = $request->symptoms;
        $disease->preventions = $request->preventions;
        $disease->save();
        return redirect(route('disease.index'))->with('message', 'Edit Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Disease::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Delete Successfull !'); 
    }
}
