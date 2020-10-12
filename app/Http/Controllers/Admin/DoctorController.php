<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\DoctorType;
use DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax())
        {
         if($request->occupation)
         {
          $data = DB::table('doctors')
            ->join('doctor_types', 'doctor_types.id', '=', 'doctors.doctor_type_id')
            ->select('doctors.id', 'doctors.name', 'doctor_types.name', 'doctors.photo', 'doctors.description', 'doctors.status')
            ->where('doctors.doctor_type_id', $request->occupation);
         }
         else
         {
          $data = DB::table('doctors')
          ->join('doctor_types', 'doctor_types.id', '=', 'doctors.doctor_type_id')
          ->select('doctors.id', 'doctors.name', 'doctor_types.name', 'doctors.photo', 'doctors.description', 'doctors.status');
         }
   
         return datatables()->of($data)
         ->addColumn('edit', function ($data) {
         return
         '<td>
         <a href="'.route('doctor.edit', $data->id).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
         </td>';
         })

         ->addColumn('delete', function ($data) {
            return
            '<td class="text-center">
            <form id="delete-form-'.$data->id.'" action="'.route('doctor.destroy',$data->id).'" style="display:none" method="post">
              '.csrf_field().'
              '.method_field('DELETE').'
            </form>
            <a href="" onclick="
                    if(confirm('."'Are you sure, you want to delete this ?'".')){
                      event.preventDefault();
                      document.getElementById('."delete-form-$data->id".').submit();
                    }else{
                      event.preventDefault();
                    }
                    ">
                    <i class="fa fa-trash  text-danger" aria-hidden="true"></i></a>
            </td>';
           /*  return 
            '<a href="" onclick="alert('."'abc'".')">
                    <i class="fa fa-trash  text-danger" aria-hidden="true"></i>
            </a>'; */
            })
         -> rawColumns(['edit','delete'])

    
      
        ->make(true);
        }
        
     
        $occupations = DB::table('doctor_types')
        ->select("*")
        ->get();

        
        return view('admin.doctor.show',compact('occupations'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $occupations = DoctorType::all();
        return view('admin.doctor.create',compact('occupations'));
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
            'occupation' =>'required',
            'description' =>'required',
            'image' =>'required',
        ]);

        $doctor = new Doctor;

        if($request->hasFile('image')){
   
            $image_save = $request->image->store('public/doctors');
            $image_split = explode("/", $image_save);
            $image_url =  '/storage/doctors/'.$image_split[2];
            $doctor->photo = $image_url;
          
        }

        if($request->status==NULL){
            $status = 0;
        }else{
            $status = 1;
        }
       

        
        $doctor->name = $request->name;
        $doctor->doctor_type_id = $request->occupation;
        $doctor->description = $request->description;
        $doctor->status = $status;

        $doctor->save();

        return redirect(route('doctor.index'))->with('message', 'Create Successfull !');
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
        $doctor = Doctor::where('id', $id)->first();
        $occupations = DoctorType::all();
        return view('admin.doctor.edit',compact('doctor','occupations'));
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
            'occupation' =>'required',
            'description' =>'required',
        ]);

        $doctor = Doctor::find($id);
         
        if($request->hasFile('image')){
   
            $image_save = $request->image->store('public/doctors');
            $image_split = explode("/", $image_save);
            $image_url =  '/storage/doctors/'.$image_split[2];
            $doctor->photo = $image_url;
          
        }

        if($request->status==NULL){
            $status = 0;
        }else{
            $status = 1;
        }
       

    
        $doctor->name = $request->name;
        $doctor->doctor_type_id = $request->occupation;
        $doctor->description = $request->description;
        $doctor->status = $status;

        $doctor->save();

        return redirect(route('doctor.index'))->with('message', 'Edit Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Doctor::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Delete Successfull !'); 
    }
}
