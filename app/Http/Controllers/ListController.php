<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Package;
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
        // $lists = Package::get();

        // $lists = DB::table('packages')->join('p_types', 'packages.ptype_id', '=', 'p_types.id')
        //                         // ->join('packages', 'goods.package_id', '=', 'packages.id')
        //                         ->where('packages.sender_phone', '=', $user_phone)
        //                         ->get();

        // $branches = DB::table('branches')->join('locations', 'branches.location_id', '=', 'locations.id')
        //                                 ->get();

        // $lists = Goods::with(['package', 'ptype', 'package.branch_departure', 'package.branch_destination', 'package.branch_departure.location', 'package.branch_destination.location'])->get()->toArray();


        $lists = Package::with([
            'ptype', 'branch_departure',
            'branch_destination', 'branch_departure.location',
            'branch_destination.location'
        ])
            ->where('sender_phone', $user_phone)
            ->get()->toArray();
        // dd($lists);

        $btnClicked = "all";
        // $collection = collection($lists)->join()


        if (count($lists) == 0) {

            return view('frontend.profile.emptylist');
        }
        return view('frontend.profile.orderlist', compact('lists', 'btnClicked'));
        // return view('frontend.profile.orderlist');
    }

    public function orderProcess()
    {
        $btnClicked = "process";
        $id = Auth::user()->id;
        $user_phone = Auth::user()->phone;

        $lists = Package::with([
            'ptype', 'branch_departure',
            'branch_destination', 'branch_departure.location',
            'branch_destination.location'
        ])
            ->where('sender_phone', $user_phone)
            ->where('status', '!=', "Completed")

            ->get()->toArray();
        // dd($lists);
        return view('frontend.profile.orderlist', compact('lists', 'btnClicked'));
    }
    public function orderCompleted()
    {
        $btnClicked = "completed";
        $id = Auth::user()->id;
        $user_phone = Auth::user()->phone;


        $lists = Package::with([
            'ptype', 'branch_departure',
            'branch_destination', 'branch_departure.location',
            'branch_destination.location'
        ])
            ->where('sender_phone', $user_phone)
            ->where('status', "Completed")

            ->get()->toArray();
        // dd($lists);
        return view('frontend.profile.orderlist', compact('lists', 'btnClicked'));
    }
}
