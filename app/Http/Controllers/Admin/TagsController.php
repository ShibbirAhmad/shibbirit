<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
         $tags=Tag::latest()->get();
        return view('admin.tag.index',compact(['tags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $data= $request->all();
   
            $validate=Validator::make($data,['tag' => 'required']);
   
            if ($validate->fails()) {
               
                 return redirect()->back()->withErrors($validate)->withInput();
   
            }
            $tag=new Tag();
            $tag->name=$request->input('tag');
            $tag->slug=str_slug($request->input('tag'));
            $up=$tag->save();
               if ($up) {
                  
                    return redirect()->back()->with('success','New Tag Added ');
               }
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
        //
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
        
        $tag=Tag::find($id);
     
        $tag->name=$request->input('tag');
        $tag->slug=str_slug($request->input('tag'));
        $up=$tag->save();
         if ($up) {
             
              return redirect()->back()->with('success','This item Updated ');
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag=Tag::find($id);
        if ($tag->delete()) {
             
            return redirect()->back()->with('warning','one item deleted');
        }
    }
}
