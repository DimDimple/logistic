<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Goods;
use App\Models\Branch;
use App\Models\Storage;
use App\Models\Position;
use App\Models\Employee;
use Fiber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbaordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $goods = Goods::get()->count();
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();


        $departure_id = $branch->id;
        $countDeparture = Package::where('departure_id', '=', $branch_id)->get()->count();
        $countDestination = Package::where('destination_id', '=', $branch_id)->get()->count();

        $packageNumber =  $countDeparture + $countDestination;
       //get package by branch
        $packages = Package::where('departure_id', '=', $branch_id)->orWhere('destination_id', '=', $branch_id)->get();
        //    dd($packages);
        //let goods are array
        // integer
        $goodNumber = 0;
        $goods = [];

        foreach ($packages as $package) {
            //loop find goods by package id 
            $goodNumber = $goodNumber + Goods::where('package_id', '=', $package->id)->get()->count();
            $goods[] = Goods::where('package_id', '=', $package->id)->get();
        }

        //default value let all variable are integer
        $countPending = 0;
        $countProcess = 0;
        $countShipped = 0;
        $countCompleted = 0;

        foreach ($goods as $goodData) {
            foreach ($goodData as $good){
                if ($good->status == 'Pending') {
                    $countPending = $countPending + 1;
                } elseif ($good->status == 'Processing') {
                    $countProcess = $countProcess + 1;
                } elseif ($good->status == 'Shipped') {
                    $countShipped = $countShipped + 1;
                } elseif ($good->status == 'Completed') {
                    $countCompleted = $countCompleted + 1;
                }
            }
        }

        // dd($countPending);

        $countEmployees = Employee::where('branch_id', '=', $branch_id)->get()->count();

        return view('backend.manager.manager', compact('packageNumber', 'packages', 'branch_id', 'departure_id', 'branch', 'goodNumber', 'countEmployees', 'countPending', 'countProcess', 'countShipped', 'countCompleted'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('backend.admin.adminDashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('backend.manager.manager');
    }
}
