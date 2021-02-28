<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Validator;

class deviceController extends Controller
{
    //
    function list($id = null)
    {
        return $id?Device::find($id ) : Device::all();
    }

    function add(Request $request)
    {
        $device = new Device;
             
        $device->name = $request->name;
        $device->member_id = $request->member_id;
        $result = $device->save();
        if($result)
        {
            return ["Result"=>"Data has been saved"];
        }
        else{
            return ["Result"=>"Operation failed"];
        }
    }

    public function update(Request $request)
    {
        $device = Device::find($request->id);
        $device->name = $request->name;
        $device->member_id= $request->member_id;
        $result = $device->save();
        if ($result)
        {
            return ["result"=>"Data has been updated"];
        }
        else
        {
            return ["result"=>"updated operation failed"];
        }
    }
    function delete($id)
    {
        $device = Device::find($id);
        $result=$device->delete();
        if($result)
        {
            return ["result"=>"Record id ".$id." has been deleted successfully"];
        }
        else{
            return ["result"=>"Delete operation failed"];
        }
    }

    function search($name)
    {
        //return Device::where('name',$name)->get();
        return Device::where('name','like',"%".$name."%")->get();


    }

    public function testData(Request $request)
    {
        $rules=array(
            "member_id"=>"required",
            "name"=>"required|min:4"
        );
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return response()->json($validator->errors(),401);
        }
        else
        {
            return ["x"=>"y"];
        }
    }
}
