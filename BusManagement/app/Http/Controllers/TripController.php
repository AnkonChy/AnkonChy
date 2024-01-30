<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class TripController extends Controller
{
    function FarePage()
    {
        $trips = Trip::with(['bus', 'startLocation', 'endLocation'])->get();
        return view('backend.pages.dashboard.trip', compact('trips'));
    } //end method
    public function Create()
    {
        $locations = Location::all();
        $buses = Bus::all();
        $trips = Trip::with(['bus', 'startLocation', 'endLocation'])->get();

        return view('backend.pages.dashboard.trip-create', compact('locations', 'buses', 'trips'));
    }

    public function Store(Request $request)
    {
        Trip::create([
            'bus_id' => $request->input('bus_id'),
            'trip_date' => $request->input('trip_date'),
            'trip_time' => $request->input('trip_time'),
            'start_from' => $request->input('start_from'),
            'destination' => $request->input('destination'),
        ]);
        Toastr::success('Trip created successful!', 'Create', ["positionClass" => "toast-top-center"]);
        return redirect()->route('trip.page');
    } //end method

    function Edit($id)
    {
        $locations = Location::all();
        $buses = Bus::all();
        $trip = Trip::findOrFail($id);
        return view('backend.pages.dashboard.trip-edit', compact('trip', 'locations', 'buses'));
    } //end method
    function Update(Request $request, $id)
    {
        Trip::where('id', $id)->update([
            'bus_id' => $request->input('bus_id'),
            'trip_date' => $request->input('trip_date'),
            'trip_time' => $request->input('trip_time'),
            'start_from' => $request->input('start_from'),
            'destination' => $request->input('destination'),
        ]);
        Toastr::success('trip updated successful!', 'Update', ["positionClass" => "toast-top-center"]);
        return redirect()->route('trip.page');
    } //end method
    function Delete($id)
    {
        Trip::where('id', $id)->delete();
        Toastr::success('Trip deleted successful!', 'Delete', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    } //end method
}
