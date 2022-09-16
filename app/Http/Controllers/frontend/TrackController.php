<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{

    public function track(Request $request)
    {

        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();


        $trackNumber = Package::where('reference_number', '=', $request->reference_number)->get();

        // $departure = Package::where('departure_id', '=', $request->departure_id)->get();
        // $departure_id = $trackNumber->departure_id;
        // $departure = Package::where('reference_number', '=', $request->departure_id)->get();

        // $destination = Package::where('reference_number', '=', $request->departure_id)->get();
        //do not have value yet
        $departure = "";
        $destination = "";

        foreach ($trackNumber as $trackNum) {
            $departure = Branch::find($trackNum->departure_id)->b_name;
            $destination = Branch::find($trackNum->destination_id)->b_name;
        }
        //  dd($departure);
        //         dd($destination);
        // dd($trackNumber);

        return view('backend.manager.page.track.index', compact('trackNumber', 'departure', 'destination'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
}