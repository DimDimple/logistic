<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Package;
use App\Models\Location;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = Auth::user()->id;
        $user_phone = Auth::user()->phone;

        // $lists = Goods::with(['package', 'ptype', 'package.branch_departure', 'package.branch_destination', 'package.branch_departure.location', 'package.branch_destination.location'])->get()->toArray();


        $lists = Package::with(['goods', 'goods.ptype', 'branch_departure',
                              'branch_destination','branch_departure.location',
                              'branch_destination.location'])
        ->where('sender_phone',$user_phone)
        ->get()->toArray();
        // dd($lists);


        // $collection = collection($lists)->join()


        if(count($lists) == 0) {

            return view('frontend.profile.emptylist');
        }
        return view('frontend.profile.orderlist', compact('lists','id'));
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
