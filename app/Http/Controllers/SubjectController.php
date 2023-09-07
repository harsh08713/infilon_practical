<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Validator;
class SubjectController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["status"=>"422","message"=>"Validaions Fail","data"=>$validator->errors()->all()]);
        }

            $Subject = new Subject();
            $message = "Subject Created successfully";
        $Subject->name = $request->post('name');
        if($Subject->save())
        {
            return response()->json(["status"=>"200","message"=>$message]);
        } else {
            return response()->json(['status'=>"500","message"=>"something went wroung !"]);
        }
    }

}