<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    public function index(Request $request){
        try{
            $students = Student::orderBy('id','desc')->get();

            return response()->json([
                'students'  => $students,
                'status' => 'success',
                'message' => 'Student Listed Successfully !!'
                ]);

        }catch (\Exception $e){
            return [
            'value'  => [],
            'status' => 'error',
            'message'   => $e->getMessage()

            ];
        }
    }
    public function store(Request $request){
        try{
            $data = [
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ];
            $student = Student::create($data);
            return response()->json([
                'student'  => $student,
                'status' => 'success',
                'message' => 'Student Added Sucessfully !!'
            ]);
        }catch (\Exception $e){
            return [
                'value'  => [],
                'status' => 'error',
                'message'   => $e->getMessage()

            ];
        }
    }

    public function edit(Request $request,$id){
        $student = Student::where('id',$id)->first();
        if($student){
            return response()->json([
                'student'  => $student,
                'status' => 'success',
                'message' => 'Edit Student Successfully !!'
            ]);
        } else{
            return response()->json([
                'status' => 'error',
                'message' => 'No Student Id Found'
            ]);
        }

    }

    public function update(Request $request,$id){
        try{
            $data = [
                'name' => $request->name,
                'course' => $request->course,
                'email' => $request->email,
                'phone' => $request->phone,
            ];
            $student = Student::where('id',$id)->update($data);
            return response()->json([
                'student'  => $student,
                'status' => 'success',
                'message' => 'Student Update Sucessfully !!'
            ]);
        } catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
        }
    }

    public function destory(Request $request,$id){
        try{
        $student = Student::where('id',$id)->first();
        $student->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Student Delete Sucessfully !!'
        ]);
        }catch(\Exception $e){
        return back()->with([
            'alert-type'    => 'danger',
            'message'       => $e->getMessage()
        ]);
        }
    }

    public function show(Request $request,$id){
        try{
            $student = Student::where('id',$id)->first();
            return response()->json([
                'student' => $student,
                'status' => 'success',
                'message' => 'Student Show Reacord Sucessfully !!'
            ]);
            }catch(\Exception $e){
            return back()->with([
                'alert-type'    => 'danger',
                'message'       => $e->getMessage()
            ]);
            }
    }
}
