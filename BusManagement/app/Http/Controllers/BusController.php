<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class BusController extends Controller
{
    function BusPage(){
        $bus = Bus::all();
        return view('backend.pages.dashboard.bus',compact('bus'));
    }//end method
    public function Create(){
        return view('backend.pages.dashboard.bus-create');
    }
    public function Store(Request $request){
        Bus::create([
            'bus_no' => $request->input('busNo'),
            'supervisor_name' => $request->input('supervisorName'),
            'supervisor_number' => $request->input('supervisorNumber')
        ]);
        Toastr::success('Bus Info created successful!', 'Create', ["positionClass" => "toast-top-center"]);
        return redirect()->route('bus.page');
    }//end method

    function Edit($id){
        $businfo = Bus::findOrFail($id);
        return view('backend.pages.dashboard.bus-edit', compact('businfo'));
    }//end method
    function Update(Request $request, $id){
        Bus::where('id',$id)->update([
            'bus_no' => $request->input('busNo'),
            'supervisor_name' => $request->input('supervisorName'),
            'supervisor_number' => $request->input('supervisorNumber')
        ]);
        Toastr::success('Location updated successful!', 'Update', ["positionClass" => "toast-top-center"]);
        return redirect()->route('bus.page');
    }//end method
    function Delete($id){
        Bus::where('id',$id)->delete();
        Toastr::success('Location deleted successful!', 'Delete', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }//end method
}
