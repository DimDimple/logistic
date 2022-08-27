<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Branch;
use App\Models\User;
use App\Models\Location;
use App\Models\Goods;
use App\Models\PType;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //find branch location of manager
        //find branch id
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;

        // $branch = Branch::where("")->branch;
        // @dd($branch);
        // @dd($branch_id);
        $packages = Package::latest()->paginate(5);
        // @dd($packages);
// if employee->branch_id==branch_id

        return view('backend.manager.page.packages.index', compact('packages', 'branch_id'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //select branch
        $branches = Branch::get();
        // if(Auth::users() == )

        //check manager departure
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();
        $departure_id = $branch->id;


        //create goods
        $goods = [];
        // track data // 
        $num = 0;
        $total_fee=0;
        $total_item=0;
        
        $package_types = PType::get();

        //check manager departure

        //null
        //in controller goods   // database package
        // $current_id = Package::get()->last()->id+1;
        // @dd($current_id);

        // $branch = $branch->users()->where('id, 3')->first();
        // @dd($branches);
        // Goods::create($request->all());
        // $num = $request->num;

        return view('backend.manager.page.packages.create', compact('branches', 'departure_id', 'num', 'goods','package_types','total_fee','total_item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $lastId = Storage::get()->last()->id;
       
        for ($i = 0; $i < $request->num; $i++) {
            $array[$i] = $lastId - $i;
    
        }

        //if we have 7iterm before then we input 3 iterm more we get 3 iterms
      
        $goods = Storage::find($array);
        //find array in goods 
        


        $request->validate([
            'sender_phone' => 'required',
            'receiver_phone' => 'required',
            'departure_id' => 'required',
            'destination_id' => 'required',
            'status' => 'required',
            'pay_status' => 'required',
            'total_fee' => 'required',
            'total_item' => 'required',

        ]);

        $savedPackage = Package::create([
            'sender_phone' => $request['sender_phone'],
            'receiver_phone' => $request['receiver_phone'],
            'departure_id' => (int)$request['departure_id'],
            'destination_id' => (int)$request['destination_id'],
            'status' => $request['status'],
            'pay_status' => $request['pay_status'],
            'total_fee' => (int)$request['total_fee'],
            'total_item' => (int)$request['total_item'],

        ]);


        if (!$savedPackage) {
            abort(503);
        }

        // loop goods in array
        foreach ($goods as $good) {
            $savedBranch[] = $savedPackage->goods()->create([
                'package_price' => (int)$good->package_price,
                'quantity' => (int)$good->quantity,
                'ptype_id' => $good->package_type,
                'fee' => (float)$good->fee,
                'message' => $good->message,
                'package_id' => $savedPackage->id,
               
            ]);
        }
        if (!$savedBranch) {
            abort(503);
        }

       

        //find branch location of manager
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;

        // $branch = Branch::where("")->branch;
        // @dd($branch);
        // @dd($branch_id);
        $packages = Package::latest()->paginate(5);
        



        return view('backend.manager.page.packages.index', compact('packages', 'branch_id'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        $branches = Branch::get();
        // if(Auth::users() == )
        // @dd(Auth::user());
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();

        $package_type = $package->package_type;

        $destination_id = $package->destination_id;
        $destination = Branch::where('id', '=', $destination_id)->first();
        $departure_id = $branch->id;
        return view('backend.manager.page.packages.edit', compact('package', 'branches', 'branch', 'destination_id', 'package_type', 'destination', 'departure_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'sender_phone' => 'required',
            'receiver_phone' => 'required',
            'departure_id' => 'required',
            'destination_id' => 'required',
            'status' => 'required',
            'pay_status' => 'required',
            'total_fee' => 'required',
            'total_item' => 'required',

        ]);
        $package->update($request->all());

        return redirect()->route('packages.index')
            ->with('success', 'Package updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //delete all goods with package ID
        $package->delete();

        return redirect()->route('packages.index')
            ->with('success', 'Package deleted successfully');
    }


    public function updatePayStatus($id)
    {
        $packages = Package::find($id);

        if ($packages->pay_status == 'Paid') {

            $packages->update(['pay_status' => 'Unpaid']);
            return redirect()->route('packages.index');
        } else {
            $packages->update(['pay_status' => 'Paid']);
            return redirect()->route('packages.index');
        }
        return redirect()->route('packages.index');
    }

   

}
