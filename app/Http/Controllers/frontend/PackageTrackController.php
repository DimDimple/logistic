<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Branch;
use App\Models\User;
use App\Models\Location;
use App\Models\Goods;
use App\Models\PType;
use App\Models\Storage;

use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class PackageTrackController extends Controller
{
   


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();
        $departure_id = $branch->id;
        $branch_id = $departure_id;
        $destination_id = $package->destination_id;
        // dd($package);
        $sender = Branch::where('id', '=', $package->departure_id)->get();
        $receiver = Branch::where('id', '=', $package->destination_id)->get();
        // dd($receiver);
        $destination = Branch::where('id', '=', $destination_id)->first();
        // track data //
        $num = 0;
        $total_fee = 0;
        $total_item = 0;

        $package_type = PType::get()->first();

        //select option get data connect to view
        //
        $package_types = PType::get();
      
        $goods = Goods::where('package_id', '=', $package->id)->get();

        //   dd($goods);
        // @dd($goods);
        //    @dd($package->branch);

        // @dd($package->id);
        // $good = Goods::where('package_id', '=', $package_id)->first()->id;
        // $package_id = Goods::latest()->paginate(5);
        // $good = $package_id;


        return view('frontend.track.detail', compact('sender','receiver','package', 'branch_id', 'branch', 'goods', 'package_type', 'destination', 'num', 'total_fee', 'total_item', 'package_types'));
    }

    
}
