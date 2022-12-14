<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Goods;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackingController extends Controller
{
    public function track(Request $request)
    {

        // $user_id = Auth::user()->id;
        // $branch = Branch::where('user_id', '=', $user_id)->first();
        // dd('dd');

        $trackNumber = Package::where('reference_number', '=', $request->reference_number)->get();
        // dd($trackNumber);

        // $departure = Package::where('departure_id', '=', $request->departure_id)->get();
        // $departure_id = $trackNumber->departure_id;
        // $departure = Package::where('reference_number', '=', $request->departure_id)->get();

        // $destination = Package::where('reference_number', '=', $request->departure_id)->get();
        //do not have value yet
        // $departure = "";
        // $destination = "";

        // foreach ($trackNumber as $trackNum) {
        //     $departure = Branch::find($trackNum->departure_id)->b_name;
        //     $destination = Branch::find($trackNum->destination_id)->b_name;
        // }
        //  dd($departure);
        //         dd($destination);
        // dd($trackNumber);

        // if ($trackNumber != $trackNumber){
        //     return view('frontend.track.emptytrack');
        // }
        // else{
        //     return view('frontend.track.track');
        // }

        $track="";
        if($trackNumber != "" ){
            foreach($trackNumber as $tracks){
                $track = $tracks->reference_number;
            }
        }

        $not_exist = 0;
        if($trackNumber->isEmpty() && isset($request->reference_number)) {
            $not_exist = 1;
        }

        return view('frontend.track.track', compact('trackNumber','track', 'not_exist'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
