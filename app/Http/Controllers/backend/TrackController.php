<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Branch;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

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
        $departure="";
        $destination="";
       
        foreach ($trackNumber as $trackNum) {
            $departure = Branch::find($trackNum->departure_id)->b_name; 
            $destination= Branch::find($trackNum->destination_id)->b_name;
             
        }
//  dd($departure);
//         dd($destination);
        // dd($trackNumber);

        return view('backend.manager.page.track.index', compact('trackNumber','departure','destination'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
