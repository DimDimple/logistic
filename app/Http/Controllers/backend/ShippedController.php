<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippedController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;

        // $branch = Branch::where("")->branch;
        // @dd($branch);
        // @dd($branch_id);
        $packages = Package::where('status', '=', 'Shipped')->get();
        // @dd($packages);
        // if employee->branch_id==branch_id

        return view('backend.manager.page.packages.index', compact('packages', 'branch_id'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
