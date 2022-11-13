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
        $btnClicked = "all";
        $id = Auth::user()->id;
        $user_phone = Auth::user()->phone;

        $lists = Package::with([
            'ptype', 'branch_departure',
            'branch_destination', 'branch_departure.location',
            'branch_destination.location'
        ])
            ->where('sender_phone', $user_phone)
            ->get()->toArray();
        // dd($lists);

        // $collection = collection($lists)->join()
        if (count($lists) == 0) {

            return view('frontend.profile.emptylist');
        }
        return view('frontend.profile.orderlist', compact('lists', 'btnClicked'));

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
