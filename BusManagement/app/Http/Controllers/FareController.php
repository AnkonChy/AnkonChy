<?php

namespace App\Http\Controllers;

use App\Models\Fare;
use App\Models\Location;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class FareController extends Controller
{
    
    function FarePage(){
        $fares = Fare::with('baseLocation', 'startFrom', 'destinationLocation')->get();
        return view('backend.pages.dashboard.fare',compact('fares'));
    }//end method
    public function Create(){
        $locations = Location::all();
        return view('backend.pages.dashboard.fare-create',compact('locations'));
    }
    public function Store(Request $request){
        Fare::create([
            'base_location' => $request->input('base_location'),
            'start_from' => $request->input('start_from'),
            'destination' => $request->input('destination'),
            'fare_amt' => $request->input('fare_amt'),
            'effect_from' => $request->input('effect_from'),
        ]);
        Toastr::success('Fare created successful!', 'Create', ["positionClass" => "toast-top-center"]);
        return redirect()->route('fare.page');
    }//end method

    function Edit($id){
        $locations = Location::all();
        $fare = Fare::findOrFail($id);
        return view('backend.pages.dashboard.fare-edit', compact('fare','locations'));
    }//end method
    function Update(Request $request, $id){
        Fare::where('id',$id)->update([
            'base_location' => $request->input('base_location'),
            'start_from' => $request->input('start_from'),
            'destination' => $request->input('destination'),
            'fare_amt' => $request->input('fare_amt'),
            'effect_from' => $request->input('effect_from')
        ]);
        Toastr::success('Fare updated successful!', 'Update', ["positionClass" => "toast-top-center"]);
        return redirect()->route('fare.page');
    }//end method
    function Delete($id){
        Fare::where('id',$id)->delete();
        Toastr::success('Fare deleted successful!', 'Delete', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }//end method
}
