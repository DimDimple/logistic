<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Goods;
use App\Models\Branch;
use App\Models\Storage;
use App\Models\Position;
use App\Models\Employee;
use App\Models\User;
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
        $countDeparture = Package::where('departure_id' ,'=',$branch_id)->get()->count();
        $countDestination = Package::where('destination_id' ,'=',$branch_id)->get()->count();

        $packageNumber =  $countDeparture + $countDestination;
        // @dd($departure_id );
        // $branch = Branch::where("")->branch;
        // @dd($branch);
        // @dd($branch_id);
        $packages = Package::latest()->paginate(5);
        //    @dd($packages);
        // if employee->branch_id==branch_id

        $goodNumber = Goods::get()->count();
        $countEmployees = Employee::get()->count();
        $countPending = Package::where('status','=','Pending')->get()->count();
        $countProcess = Package::where('status','=','Process')->get()->count();
        $countShipped = Package::where('status','=','Shipped')->get()->count();
        $countCompleted = Package::where('status','=','Completed')->get()->count();

        return view('backend.manager.manager', compact('packageNumber', 'packages', 'branch_id', 'departure_id', 'branch', 'goodNumber','countEmployees','countPending','countProcess','countShipped','countCompleted'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $totalAdmin = User::where('type','1')->get()->count();
        $totalManager = User::where('type','2')->get()->count();
        $totalUser = User::where('type','0')->get()->count();

        return view('backend.admin.adminDashboard',compact('totalUser','totalManager','totalAdmin'));
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
