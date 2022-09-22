<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\PType;
use Illuminate\Http\Request;

class PTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package_types= PType::all();
        
        return view('backend.manager.page.packageType.index', compact('package_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('backend.manager.page.packageType.index');
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
            'package_type' => 'required',
        ]);
        
        PType::create($request->all());

        return redirect()->route('packageType.index')

        ->with('message', 'Package Type created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PType  $pType
     * @return \Illuminate\Http\Response
     */
    public function show(PType $pType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package_types = PType::find($id); 
 
        return view('backend.manager.page.packageType.edit', compact('package_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package_types = PType::find($id);
        
         if(isset($request->package_type)){
            $package_types->package_type = $request->package_type;
         }

         $package_types->save();
       
         return redirect()->route('packageType.index')
         ->with('message', 'Package type updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PType  $pType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PType $pType, $id)
    {
        $pType = PType::find($id);
        $pType->delete();
        return redirect()->route('packageType.index')
                        ->with('message','Package Type deleted successfully');
    }
}
