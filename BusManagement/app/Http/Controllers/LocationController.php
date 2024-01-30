<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class LocationController extends Controller
{
    function LocationPage(){
        $locations = Location::all();
        return view('backend.pages.dashboard.location',compact('locations'));
    }//end method
    public function Create(){
        return view('backend.pages.dashboard.location-create');
    }
    public function Store(Request $request){
        Location::create([
            'place_name' => $request->input('placeName'),
            'distance_km' => $request->input('distancekm'),
            'stopage_order' => $request->input('stopageOrder')
        ]);
        Toastr::success('Location created successfully!', 'Create', ["positionClass" => "toast-top-center"]);
        return redirect()->route('location.page');
    }//end method

    function Edit($id){
        $location = Location::find($id);
        return view('backend.pages.dashboard.location-edit', compact('location'));
    }//end method
    function Update(Request $request){
        Location::where('id',$request->input('id'))->update([
            'place_name' => $request->input('placeName'),
            'distance_km' => $request->input('distance'),
            'stopage_order' => $request->input('stopageOrder')
        ]);
        Toastr::success('Location updated successful!', 'Update', ["positionClass" => "toast-top-center"]);
        return redirect()->route('location.page');
    }//end method
    function Delete($id){
        Location::where('id',$id)->delete();
        Toastr::success('Location deleted successful!', 'Delete', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }//end method
}
