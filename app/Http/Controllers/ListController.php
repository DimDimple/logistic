<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Package;
use App\Models\Location;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

        // $d = Goods::first()->created_at->format('dd/mm/Y'); //returns a Carbon instance via Eloquent
        // dd( $d );
        $id = Auth::user()->id;
        $user_phone = Auth::user()->phone;
        // dd(Auth::user()->phone);
        // $lists = User::where('user_id','=', $user_id)->last();
        // $branch = Branch::where('user_id', '=', $user_id)->first();
        // $lasts=User::select()
        // ->whereHas('user', function($query) use ($id){
        //     if ($id){
        //         $query->where('user_id', $id);
        //     }
        // })

        // ->latest()->get();
        // $data = Package::get();

        // $mydata = DB::table('goods')->join('packages', 'goods.package_id', '=', 'packages.id')->get();
        // ->select('comments.comments', 'profile.last_name', 'profile.first_name')


        $lists = DB::table('goods')->join('p_types', 'goods.ptype_id', '=', 'p_types.id')
            ->join('packages', 'goods.package_id', '=', 'packages.id')
            ->where('packages.sender_phone', '=', $user_phone)
            ->get();

        $branches = DB::table('branches')->join('locations', 'branches.location_id', '=', 'locations.id')
            ->get();

        // $p_types = DB::table('goods')->join('packages', 'goods.package_id', '=', 'packages.id')
        //                              ->join('p_types','goods.ptype_id', '=', 'p_types.id')
        //                             ->get();
        // dd($lists);

        // ->join('branches as des', 'packages.departure_id', '=', 'des.id')
        // ->join('locations as loc_des', 'des.location_id', '=', 'loc_des.id')

        // $lists = DB::table('goods')->join('packages', 'goods.package_id', '=', 'packages.id')
        // ->join('branches as depa', 'packages.departure_id', '=', 'depa.id')
        // ->join('locations as loc_depa', 'depa.location_id', '=', 'loc_depa.id')
        // ->join('branches as des', 'packages.departure_id', '=', 'des.id')
        // ->join('locations as loc_des', 'des.location_id', '=', 'loc_des.id')
        // ->where('packages.sender_phone', '=', $user_phone)
        //  ->get();

        //dd($lists);

        // ->join('locations', 'branches.location_id', '=', 'locations.id')


        // $lists_destination = DB::table('goods')->join('packages', 'goods.package_id', '=', 'packages.id')
        //                           ->join('branches', 'packages.destination_id', '=', 'branches.id')
        //                           ->join('locations', 'branches.location_id', '=', 'locations.id')
        //                           -> where('packages.sender_phone', '=', $user_phone)
        //                           ->get();

        // for ($i = 0 ; $i < count($lists) ; $i++){
        //     $lists[$i] = ...$lists[$i], 'dd':'ddd';
        // }



        //  dd($lists_departure);

        //$lists = Goods::get();
        //  dd(count($lists));
        if (count($lists) == 0) {

            return view('frontend.profile.emptylist');
        }
        return view('frontend.profile.orderlist', compact('lists', 'branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
