<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    public function student_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'class_id' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(["status"=>"422","message"=>"Validaions Fail","data"=>$validator->errors()->all()]);
        }

            $Student = new Student();
            $message = "Student Created successfully";
        $Student->name = $request->post('name');
        $Student->email = $request->post('email');
        $Student->address = $request->post('address');
        $Student->class_id = $request->post('class_id');
        if($Student->save())
        {
            return response()->json(["status"=>"200","message"=>$message]);
        } else {
            return response()->json(['status'=>"500","message"=>"something went wroung !"]);
        }
    }
}