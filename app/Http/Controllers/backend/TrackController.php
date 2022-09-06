<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Goods;

use Illuminate\Http\Request;

class TrackController extends Controller
{

    
    public function search()
    {
        
        $package = Package::find($id);
        $package_id = Package::where('reference_number', '=', $request->reference_number)->first();

        return view('backend.manager.page.track.index', compact('package_id'));
        
    }
}
