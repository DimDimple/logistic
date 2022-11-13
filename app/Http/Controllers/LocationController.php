<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;
use Locale;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $locations = Location::latest()->paginate(5);

        return view('backend.admin.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.admin.locations.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'province' => 'required',
            'address' => 'required',
        ]);

        Location::create($request->all());

        return redirect()->route('location.index')
            ->with('message', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::find($id);

         return view('backend.admin.locations.edit', compact('locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Location $locations,$id)
    {

        // $request->validate([
        //     'province' => 'required',
        //     'address' => 'required',
        // ]);

        // $locations->update($request->all());
        $locations = Location::find($id);
        if(isset($request->province)){
            $locations->province = $request->province;
         }
         if(isset($request->address)){
            $locations->address = $request->address;
         }

         $locations->save();

         return redirect()->route('location.index')
         ->with('message', 'Location updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')
                        ->with('message','Location deleted successfully');
    }
}
