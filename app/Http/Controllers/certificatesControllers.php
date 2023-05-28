<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\certificates;


class certificatesControllers extends Controller
{
    public function getAll()
    {
        $certificates =  certificates::all();

        if (count($certificates) > 0) {
            $respond = [
                'status' => 200,
                'message' => 'All certificates',
                'data' => $certificates,
            ];
            return $respond;
        } else {
            $respond = [
                'status' => 401,
                'message' => 'No certificates found',
                'data' => [],
            ];
            return $respond;
        }
    }
    // create certificates
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            // return response()->json($validator->errors()->toJson(), 400);
            $respond = [
                "status" => 401,
                "message" => $validator->errors()->first(),
                "data" => null
            ];

            return response($respond);
        } else {

            $certificates = certificates::create([
                'name' => $request->get('name')
            ]);

            $respond = [
                "status" => 200,
                "message" => "added successfully",
                "data" => $certificates
            ];
            return response($respond);
        }
    }
     //Delete an certificates
     public function delete($id)
     {
         $certificates = certificates::find($id);
         if (isset($certificates)) {
             $certificates->delete();
             $respond = [
                 'status' => 200,
                 'message' => 'certificates deleted',
                 'data' => $certificates,
             ];
             return $respond;
         } else {
             $respond = [
                 'status' => 401,
                 'message' => 'certificates not found',
                 'data' => null,
             ];
             return $respond;
         }
     }
}
