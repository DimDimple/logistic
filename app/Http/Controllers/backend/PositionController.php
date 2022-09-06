<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Position::all();
        return view('backend.manager.page.position.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.manager.page.position.index');
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
            'type' => 'required',
        ]);

        Position::create($request->all());

        return redirect()->route('position.index')

            ->with('success', 'Position created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
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
        $types  = Position::find($id);
      
        return view('backend.manager.page.position.edit', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $position)
    {
        
        // $types = Position::find($id);
      
        // if (isset($request->type)) {
        //     $types->type;
        // }

        // $types->save();
        // return redirect()->route('position.index')
        //     ->with('succees', 'Employee updated successfully');

        $request->validate([
            'type' => 'required'
        ]);

        $position->update($request->all());

        return redirect()->route('position.index')
            ->with('succees', 'Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ptype $type)
    {
        // $position = Position::find($id);
        $type = Position::where('id', '=', $type->id)->get();


        $type->delete();
        return redirect()->route('position.index')
            ->with('success', 'Position deleted successfully');
    }
}