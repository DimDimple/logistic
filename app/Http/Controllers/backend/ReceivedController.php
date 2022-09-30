<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;

class ReceivedController extends Controller
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

        $packages = Package::where('status','=','Received')->get();
       
        return view('backend.manager.page.packageindash.index', compact('packages','branch_id'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

  
}
