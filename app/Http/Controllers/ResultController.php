<?php

namespace App\Http\Controllers;
use App\Models\Result;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
class ResultController extends Controller
{
    public function result_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'class_id' => 'required',
            'student_id' => 'required',
            'subject_id' => 'required',
            'marks' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["status"=>"422","message"=>"Validaions Fail","data"=>$validator->errors()->all()]);
        }

            $Result = new Result();
            $message = "Result Created successfully";
        $Result->student_id = $request->post('student_id');
        $Result->class_id = $request->post('class_id');
        $Result->subject_id = $request->post('subject_id');
        $Result->marks = $request->post('marks');
        if($Result->save())
        {
            return response()->json(["status"=>"200","message"=>$message]);
        } else {
            return response()->json(['status'=>"500","message"=>"something went wroung !"]);
        }
    }

    public function index(Request $request){
        $studentlist = Student::get(['name','id']);
        $subjectlist = Subject::get(['id','name']);
        return view('dashboard',compact('subjectlist','studentlist'));
    }

    public function datatable()
    {
        $data = Result::all();
        return Datatables::of($data)
    ->addIndexColumn()
    ->make(true);

    }

}