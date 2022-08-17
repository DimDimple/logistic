<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::latest()->paginate(5);

        return view('backend.manager.page.packages.index', compact('packages'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.manager.page.packages.create');
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
            'sender_phone' => 'required',
            'receiver_phone' => 'required',
            'package_value' => 'required',
            'quantity' => 'required',
            'departure' => 'required',
            'destination' => 'required',
            'package_type' => 'required',
            'shipping' => 'required',
        ]);
        Package::create($request->all());

        return redirect()->route('packages.index')
        ->with('success', 'Package created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('backend.manager.page.packages.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'sender_phone' => 'required',
            'receiver_phone' => 'required',
            'package_value' => 'required',
            'quantity' => 'required',
            'destination' => 'required',
            'package_type' => 'required',
            'shipping' => 'required',
        ]);
        $package->update($request->all());

        return redirect()->route('packages.index')
        ->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')
        ->with('success','Package deleted successfully');
    }
}
