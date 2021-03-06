<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiseaseType;
use App\Models\Research;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researches = Research::all();
        return view('admin.research.show',compact('researches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $types = DiseaseType::all();
        return view('admin.research.create',compact('types'));
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
            'type' =>'required',
            'title' =>'required',
            'author' =>'required',
            'subtitle' =>'required',
            'content' =>'required',
            'image' =>'required',
        ]);
        $research = new Research;
        
        if($request->hasFile('image')){
   
            $image_save = $request->image->store('public/research');
            $image_split = explode("/", $image_save);
            $image_url =  '/storage/research/'.$image_split[2];
            $research->thumbnail = $image_url;
     
          
        }

        if($request->hasFile('video')){
   
            $image_save = $request->video->store('public/videos');
            $image_split = explode("/", $image_save);
            $image_url =  '/storage/videos/'.$image_split[2];
            $research->video = $image_url;
        }

        if($request->status==NULL){
            $status = 0;
        }else{
            $status = 1;
        }
       
   
        $research->disease_type_id = $request->type;
        $research->title = $request->title;
        $research->author = $request->author;
        $research->subtitle = $request->subtitle;
        $research->content = $request->content;
        $research->status = $status;
        $research->save();
        return redirect(route('research.index'))->with('message', 'Edit Successfull !');
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
        $research = Research::where('id', $id)->first();
        $types = DiseaseType::all();
        return view('admin.research.edit',compact('research','types'));
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
            'type' =>'required',
            'title' =>'required',
            'author' =>'required',
            'subtitle' =>'required',
            'content' =>'required',
        ]);
        $research = Research::find($id);

        if($request->hasFile('image')){
   
            $image_save = $request->image->store('public/research');
            $image_split = explode("/", $image_save);
            $image_url =  '/storage/research/'.$image_split[2];
            $research->thumbnail = $image_url;
     
          
        }

        if($request->hasFile('video')){
   
            $image_save = $request->video->store('public/videos');
            $image_split = explode("/", $image_save);
            $image_url =  '/storage/videos/'.$image_split[2];
            $research->video = $image_url;
        }

        if($request->status==NULL){
            $status = 0;
        }else{
            $status = 1;
        }
       
    
        $research->disease_type_id = $request->type;
        $research->title = $request->title;
        $research->author = $request->author;
        $research->subtitle = $request->subtitle;
        $research->content = $request->content;
        $research->status = $status;
        $research->save();
        return redirect(route('research.index'))->with('message', 'Edit Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Research::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Delete Successfull !'); 
    }
}
