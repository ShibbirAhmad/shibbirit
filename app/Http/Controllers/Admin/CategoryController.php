<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::latest()->get();
        return view('admin.category.index',compact(['category']));
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
         $this->validate($request,[
             'category' => 'required',
             'categoryImage' => 'required|mimes:jpg,jpeg,png,gif',
         ]);

        // //get form image
        // $image=$request->file('categoryImage');
        // $slug=str_slug($request->category);

        // if (isset($image)) {
        //     //make unique name
        //     $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
        //     //check directory
        //     if (!Storage::disk('public')->exists('category')) {
                 
        //         Storage::disk('public')->makeDirectory('category');  
        //     }
        //      Storage::disk('public')->put('category/'.$imageName,$image);
        // }else {
            
        //      $imageName="default.png";
        // }
     
        //inputing to database
        $category= new Category();
        $category->name=$request->category;
        $category->slug=str_slug($request->category);
        
        if ($category->save()) {
           
              if ($request->hasFile('categoryImage')) {
                  $image=$request->file('categoryImage');
                  $slug=str_slug($request->category);
                  $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                  $image->move(public_path('backend/images/category/'),$imageName);

                  Category::find($category->id)->update(['image'=>$imageName]);
              }
            
        }

           return redirect()->back()->with('success','Successfully New Category Added with image');
  
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
        $ctg=Category::find($id);

        $this->validate($request,[
            'category' => 'required',
            'categoryImage' => 'mimes:jpg,jpeg,png,gif',
        ]);
        
                  
                   
        $ctg->name=$request->category;
        
        
        if ($ctg->save()) {

              if ($request->hasFile('categoryImage')) {

                
            //checking old image and deleting
            if (file_exists('backend/images/category/'.$ctg->image) ) {
                  
                 unlink('backend/images/category/'.$ctg->image); 
            }
          
                  $image=$request->file('categoryImage');
                  $slug=str_slug($request->category);
                  $imageName=$slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

                  $image->move(public_path('backend/images/category/'),$imageName);

                      Category::find($ctg->id)->update(['image'=>$imageName]);
                  
                  
              
              }
            
        }

           return redirect()->back()->with('success','Succeessfully This Category Updated with image');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $delitem=Category::find($id);
          
            //checking old image and deleting
            if (file_exists('backend/images/category/'.$delitem->image) ) {
                  
                unlink('backend/images/category/'.$delitem->image); 
             }
          
          if ($delitem->delete()) {
              
            return redirect()->back()->with('warning','one item Deleted!');
          }
    }
}
