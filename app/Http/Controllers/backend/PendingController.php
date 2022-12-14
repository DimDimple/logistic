<?php

namespace App\Http\Controllers\backend;

use App\Models\Branch;
use App\Models\Package;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;

        $packages = Package::where('status','=','Pending')->get();
       
        return view('backend.manager.page.packageindash.index', compact('packages','branch_id'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
}
