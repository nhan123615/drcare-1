<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Product;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
     
        return view('admin.image.show',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = Image::all();
        $products = Product::all();
        return view('admin.image.create',compact('images','products'));
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
            'product_id' =>'required',
        ]);
        $image = new Image;

            
            if($request->hasFile('image_main')){
   
                $image_main_save = $request->image_main->store('public/products');
                $image_main_split = explode("/", $image_main_save);
                $image_main =  '/storage/products/'.$image_main_split[2];
                $image->image_main = $image_main;
            }

            if($request->hasFile('image_front')){
    
                  $image_front_save = $request->image_front->store('public/products');
                  $image_front_split = explode("/", $image_front_save);
                  $image_front =  '/storage/products/'.$image_front_split[2];
                  $image->image_front = $image_front;
              }

              if($request->hasFile('image_back')){
    
                $image_back_save = $request->image_back->store('public/products');
                $image_back_split = explode("/", $image_back_save);
                $image_back =  '/storage/products/'.$image_back_split[2];
                $image->image_back = $image_back;
            }

            if($request->hasFile('image_right')){
    
                $image_right_save = $request->image_right->store('public/products');
                $image_right_split = explode("/", $image_right_save);
                $image_right =  '/storage/products/'.$image_right_split[2];
                $image->image_right = $image_right;
            }

            if($request->hasFile('image_left')){
    
                $image_left_save = $request->image_left->store('public/products');
                $image_left_split = explode("/", $image_left_save);
                $image_left =  '/storage/products/'.$image_left_split[2];
                $image->image_left = $image_left;
            }
       

      
        $image->product_id = $request->product_id;
        $image->save();

        return redirect(route('image.index'))->with('message', 'Insert Successfull !');
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
        $image = Image::where('id', $id)->first();
        $products = Product::all();
        return view('admin.image.edit',compact('image','products'));
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
            'product_id' =>'required',
        ]);
        $image = Image::find($id);

            
            if($request->hasFile('image_main')){
   
                $image_main_save = $request->image_main->store('public/products');
                $image_main_split = explode("/", $image_main_save);
                $image_main =  '/storage/products/'.$image_main_split[2];
                $image->image_main = $image_main;
            }

            if($request->hasFile('image_front')){
    
                  $image_front_save = $request->image_front->store('public/products');
                  $image_front_split = explode("/", $image_front_save);
                  $image_front =  '/storage/products/'.$image_front_split[2];
                  $image->image_front = $image_front;
              }

              if($request->hasFile('image_back')){
    
                $image_back_save = $request->image_back->store('public/products');
                $image_back_split = explode("/", $image_back_save);
                $image_back =  '/storage/products/'.$image_back_split[2];
                $image->image_back = $image_back;
            }

            if($request->hasFile('image_right')){
    
                $image_right_save = $request->image_right->store('public/products');
                $image_right_split = explode("/", $image_right_save);
                $image_right =  '/storage/products/'.$image_right_split[2];
                $image->image_right = $image_right;
            }

            if($request->hasFile('image_left')){
    
                $image_left_save = $request->image_left->store('public/products');
                $image_left_split = explode("/", $image_left_save);
                $image_left =  '/storage/products/'.$image_left_split[2];
                $image->image_left = $image_left;
            }
       

      
        $image->product_id = $request->product_id;
        $image->save();

        return redirect(route('image.index'))->with('message', 'Edit Successfull !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Delete Successfull !'); 
    }
}
