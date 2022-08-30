<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Package;
use App\Models\Branch;
use App\Models\Goods;
use App\Models\PType;
use App\Models\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'package_price' => 'required',
            'quantity' => 'required',
            'package_type' => 'required',
            'fee' => 'required',
            'message' => 'required',


        ]);
        Storage::create($request->all());
        $branches = Branch::get();
        // if(Auth::users() == )
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();


        //check manager departure
        $departure_id = $branch->id;


        //find array the last iterm like we create 2 iterm they get two items by we count the last id to the top
        $lastId = Storage::get()->last()->id;
       

        for ($i = 0; $i < $request->num; $i++) {
            $array[$i] = $lastId - $i;
           
        }

        //if we have 7iterm before then we input 3 iterm more we get 3 iterms
        $package_types = PType::get();
        $goods = Storage::find($array);
        $num = $request->num;
        //
        $total_item = $num;
        $total_fee = $request->total_fee+$request->fee;


        //find array in goods
        return view('backend.manager.page.packages.create', compact('branches', 'user_id', 'branch', 'num', 'departure_id', 'goods','package_types','total_item','total_fee'));
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
     * @param  \App\Models\Storage  $storage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Storage $storage, Request $request)
    {
        //delete all goods with package ID
        // @dd($storage);
        $storage->delete();



       
        $branches = Branch::get();
        // if(Auth::users() == )
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();


        //check manager departure
        $departure_id = $branch->id;


        //find array the last iterm like we create 2 iterm they get two items by we count the last id to the top
        $lastId = Storage::get()->last()->id;
       

        for ($i = 0; $i < $request->num; $i++) {
            $array[$i] = $lastId - $i;
           
        }

        //if we have 7iterm before then we input 3 iterm more we get 3 iterms
        $package_types = PType::get();
        $goods = Storage::find($array);
        $num = $request->num;
        //
        $total_item = $num;
        $total_fee = $request->total_fee+$request->fee;


        //find array in goods
        return view('backend.manager.page.packages.create', compact('branches', 'user_id', 'branch', 'num', 'departure_id', 'goods','package_types','total_item','total_fee'));
    }
}
