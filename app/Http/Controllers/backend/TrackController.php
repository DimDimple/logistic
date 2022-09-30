<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Branch;
use App\Models\Goods;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrackController extends Controller
{
   
    public function track(Request $request)
    {

        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();


        $trackNumber = Package::where('reference_number', '=', $request->reference_number)->get();

   
       
        
        return view('backend.manager.page.track.index', compact('trackNumber'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
