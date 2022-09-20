<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Goods;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippedController extends Controller
{
    public function index()
    {
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;


        // $packages = Package::where('destination_id', '=', $destination_id)->get();
        //
        $packages = Package::where('departure_id', '=', $branch_id)->orWhere('destination_id', '=', $branch_id)->get();
        $goods = [];

        foreach ($packages as $package) {
            //loop find goods by package id
            $goods[] = Goods::where('package_id', '=', $package->id)->get(); 
            
        }
       $goodS = [];
        foreach ($goods as $goodData) {
            foreach ($goodData as $good){
                if ($good->status == 'Shipped') {
                    $goodS[] =$good;
                }
            }
        }
        $goods=$goodS;

        return view('backend.manager.page.goods.index', compact('goods'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        //
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
