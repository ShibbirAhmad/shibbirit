<?php

namespace App\Http\Controllers;

use Validator;
use App\Student;
use Illuminate\Http\Request;

class stuedentController extends Controller
{
       public function index(){

                
              $student= Student::all();

              return view('student.index',compact ('student'));

       }


       public function create(){

              return view('student.create');
       }



      public function store(Request $request){

             $data= $request->all();
           

             $validate = Validator::make($data,[
                    'name' => 'required |min:4',
                    'roll' => 'required|unique::students'
              ]);

              if($validate->fails()){
                  
                     return redirect()->back()->withErrors($validate)->withInput();


              }

                Student::create($data); 

             return redirect('student')->with('success','new student created successfully!');
      }



      public function show($id) {
               
           $data = Student::findOrFail($id);
       //      return $data;
           return view('student.show', compact('data'));

      }


      public function send($id){
              
           $student = Student::findOrFail($id);

           return view('student.edit',compact('student'));

      }

     


     public  function update(Request $request,$id){
            
          $student = Student::findOrFail($id);

             $student->update($request->all());


       
       }



       public function destroy($id){

                $student = Student::findOrFail($id);

                  $student->delete();
       }








}
