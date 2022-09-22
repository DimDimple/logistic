<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\backend\Redirect;
use Illuminate\Http\Request;
use App\Models\Package;
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
    public function index(Request $request)
    {
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;


        // $packages = Package::where('destination_id', '=', $destination_id)->get();
        //
        $packages = Package::where('departure_id', '=', $branch_id)->orWhere('destination_id', '=', $branch_id)->get();
        //    dd($packages);
        //let goods are array
        // two dimension array (array loop in array)
        $goods = [];
        $goodData=[];
        foreach($packages as $package){
            //loop find goods by package id
            $goodData=Goods::where('package_id','=',$package->id)->get();
            foreach($goodData as $good){
                $goods[]=$good;
            }

        }

        // $search = $request->q;

        // if($search!=""){
        //     $goods = Goods::where(function ($query) use ($search){
        //         $query->where('reference_number', 'like', '%'.$search.'%');
        //     })
        //     ->paginate(5);
        //     $goods->appends(['q' => $search]);
        // }
        // else{
        //     $goods = Goods::latest()->paginate(5);
        // }
    //    dd($goods);
        return view('backend.manager.page.goods.index', compact('goods'));
    }


    public function updateStatus(Request $request, $id)
    {
        $good = Goods::find($id);
        $good->status = $request->status;
        $good->save();
        return 'Package status updated successfully.';
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
            'package_type' => 'required',
            'fee' => 'required',
            'message' => 'required',
            'status' => 'required',

        ]);
        $savedStorages = Storage::create([

            'package_type' => $request['package_type'],
            'package_price' => (float)$request['package_price'],
            'fee' => (float)$request['fee'],
            'message' => $request['message'],
            'status' => $request['status'],
            'reference_number' => ("DM" . random_int(1000, 9999)), //random to user // string DM + 4 number
        ]);



        if (!$savedStorages) {
            abort(503);
        }



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
        // dd($goods);

        $total_item = $num;
        $total_fee = $request->total_fee + $request->fee;

        $p_types=[];
        
        foreach($goods as $good){
            $p_types[]=PType::find($good->package_type);
            
        }
        // $test = ['hello','hi'];
        // dd($test[0]);

        //find array in goods
        return view('backend.manager.page.packages.create', compact('branches', 'user_id', 'branch', 'num', 'departure_id', 'goods', 'package_types', 'total_item', 'total_fee','p_types'));
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
        $good = Goods::find($id);
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        // $completed = false;
        // if($good->package->departure_id == $branch_id){
        //     $completed = true;
        // }
        return view('backend.manager.page.packages.show', compact('good'));
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
        // return $request;
        $good = Goods::find($id);
        // $good->package_price = $request->package_price;
        // $good->ptype_id = $request->package_type;
        // $good->fee = $request->fee;
        // $good->status = $request->status;
        // $good->message = $request->message;
        // $good->reference_number = $good->reference_number;
        //  if(isset($request->package_price)){
        //     $good->package_price = $request->package_price;
        //  }
        //  if(isset($request->package_type)){
        //     $good->ptype_id = $request->package_type;
        //  }
        //  if(isset($request->fee)){
        //     $good->fee = $request->fee;
        //  }
        //  if(isset($request->status)){
        //     $good->status = $request->status;
        //  }
        //  if(isset($request->message)){
        //     $good->message = $request->message;
        //  }
        //  if(isset($good->reference_number)){
        //     $good->reference_number = $good->reference_number;
        //  }

        $request->validate([
            'package_price' => 'required',
            'package_type' => 'required',
            // 'status' => 'required',
            'status' => 'required',
            'fee' => 'required',
            'message' => 'required',

        ]);
        // $good->ptype_id = $request->package_type;
        // $good->save();
        $good->update($request->all());

        //update total fee in package
        $package = Package::find($good->package_id);
        $goods = Goods::where('package_id', '=', $good->package_id)->get();
        //find variable
        $total_fee = 0;
        foreach ($goods as $good) {
            //sum fee
            $total_fee = $total_fee + $good->fee;
        }
        //update total fee+
        $package->total_fee = $total_fee;
        $package->save();
        return $id;
        // return redirect()->route('goods.index')
        //     ->with('message', 'Goods updated successfully');

        //     $branches = Branch::get();
        //     $user_id = Auth::user()->id;
        //     $branch = Branch::where('user_id', '=', $user_id)->first();
        //     $departure_id = $branch->id;
        //     $destination_id = $package->destination_id;

        //     $destination = Branch::where('id', '=', $destination_id)->first();
        //     // track data //
        //     $num = 0;
        //     $total_fee = 0;
        //     $total_item = 0;

        //     $package_type = PType::get()->first();



        //     $goods = Goods::where('package_id', '=', $package->id)->get();

        //     // @dd($goods);
        //     //    @dd($package->branch);

        //     // @dd($package->id);
        //     // $good = Goods::where('package_id', '=', $package_id)->first()->id;
        //     // $package_id = Goods::latest()->paginate(5);
        //     // $good = $package_id;
        //     return redirect()->route('packages.show', compact('package', 'branch', 'goods', 'package_type','destination', 'num', 'total_fee', 'total_item'))
        //   ->with('success', 'Goods updated successfully.');

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
        $total_fee = $request->total_fee + $request->fee;


        //find array in goods
        return view('backend.manager.page.packages.create', compact('branches', 'user_id', 'branch', 'num', 'departure_id', 'goods', 'package_types', 'total_item', 'total_fee'));
    }
}
