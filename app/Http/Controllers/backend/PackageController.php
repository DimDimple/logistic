<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Branch;
use App\Models\User;
use App\Models\Location;

use App\Models\PType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Package $package)
    {
        //find branch location of manager
        //find branch id
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();
        $departure_id = $branch->id;
        $branch_id = $departure_id;
        $destination_id = $package->destination_id;
        $ends= "";
        $starts="";
        $sendmessage="";
        // $sender = Branch::where('id', '=', $package->departure_id)->get();
        // $receiver = Branch::where('id', '=', $package->destination_id)->get();

        // @dd($request );
        // $branch = Branch::where("")->branch;
        // @dd($branch);
        // @dd($branch_id);
        $packages = Package::latest()->paginate(5);
        //    @dd($packages);
        // if employee->branch_id==branch_id
        
        // $search = $request->q;

        // if($search!=""){
        //     $packages = Package::where(function ($query) use ($search){
        //         $query->where('sender_phone', 'like', '%'.$search.'%')
        //             ->orWhere('receiver_phone', 'like', '%'.$search.'%');
                   
        //     })
        //     ->paginate(5);
        //     $packages->appends(['q' => $search]);
        // }
        // else{
        //     $packages = Package::latest()->paginate(5);
        // }

        return view('backend.manager.page.packages.index', compact('packages', 'branch_id', 'departure_id', 'branch','starts','ends','sendmessage'))
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

       
        // $package_type = PType::get()->first();
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

        return view('backend.manager.page.packages.create', compact('branches', 'departure_id', 'package_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // // dd($request);
        // $lastId = Storage::get()->last()->id;

        // for ($i = 0; $i < $request->num - 1; $i++) {
        //     $array[$i] = $lastId - $i;
        // }

        //if we have 7iterm before then we input 3 iterm more we get 3 iterms

        // $goods = Storage::find($array);
        //find array in goods
// dd($request);
        $request->validate([
            'sender_phone' => 'required',
            'receiver_phone' => 'required',
            'departure_id' => 'required',
            'destination_id' => 'required',
            'status' => 'required',
            'pay_status' => 'required',
            'sender_email' => 'required',
            'receiver_email' => 'required',
            'package_price'=> 'required',
            'ptype_id'=> 'required',
            'delivery_charge'=> 'required',
            'product_description'=> 'required',
            'special_instruction'=> 'required',
            'weight'=> 'required',

        ]);

        $savedPackage = Package::create([
            'sender_phone' => $request['sender_phone'],
            'receiver_phone' => $request['receiver_phone'],
            'departure_id' => (int)$request['departure_id'],
            'destination_id' => (int)$request['destination_id'],
            'status' => $request['status'],
            'pay_status' => $request['pay_status'],
            'sender_email' => $request['sender_email'],
            'receiver_email' => $request['receiver_email'],
            'ptype_id' => (int)$request['ptype_id'],
            'package_price' => (float)$request['package_price'],
            'weight' => (float)$request['weight'],
            'delivery_charge' => (float)$request['delivery_charge'],
            'product_description' => $request['product_description'],
            'special_instruction' => $request['special_instruction'],
            'reference_number' => ("DM" . random_int(1000, 9999)), //random to user // string DM + 4 number
        ]);

        //    dd($savedPackage);

        if (!$savedPackage) {
            abort(503);
        }


        //find branch location of manager
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;

        // $branch = Branch::where("")->branch;
        // @dd($branch);
        // @dd($branch_id);
        $packages = Package::latest()->paginate(5);
       $ends="";
       $starts="";
       $sendmessage="";
        // unset $request;
        // @dd($request);

        return view('backend.manager.page.packages.index', compact('packages', 'branch_id','ends','starts','sendmessage'))
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
     
    
        $package_type = PType::get()->first();

        //select option get data connect to view
        //
        $package_types = PType::get();
      
     

//   dd($goods);
        // @dd($goods);
        //    @dd($package->branch);

        // @dd($package->id);
        // $good = Goods::where('package_id', '=', $package_id)->first()->id;
        // $package_id = Goods::latest()->paginate(5);
        // $good = $package_id;


        return view('backend.manager.page.packages.show', compact('sender','receiver','package', 'branch_id', 'branch', 'package_type', 'destination','package_types'));
    }


    public function updateStatus(Request $request, $id)
    {
        $package = Package::find($id);
        $package->status = $request->status;
        $package->save();
        return redirect()->route('packages.index')
        ->with('message', 'Status updated successfully.');
    }

    public function filterupdatestatus(Request $request )
    {
        // dd($request);
        $sendmessage ="";
       if($request->ends=="" && $request->starts=="" ){
        $starts = $request->starts_date;
        $ends = $request->ends_date;
       }
       else{
        $starts = $request->starts;
        $ends = $request->ends;
       }
        $branches = Branch::get();
        $user_id = Auth::user()->id;
        $branch_id = Branch::where('user_id', '=', $user_id)->first()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();
        $departure_id = $branch->id;
        $branch_id = $departure_id;
        $packages = Package::whereDate('created_at', '>=', $starts)
        ->whereDate('created_at', '<=', $ends)
        ->get();
        //  dd($packages);
        //true or false 
        //if package has data result true
        //but package has not data result false
        if(isset($request->status)) {
            $sendmessage = "Status update successfully.";
            foreach($packages as $package){
                if(($request->status=="Pending" || $request->status=="Shipped") && $package->departure_id==$branch_id){
                    $package->status=$request->status;
                    $package->save();
                }
                if(($request->status=="Received" || $request->status=="Completed") && $package->destination_id==$branch_id){
                    $package->status=$request->status;
                    $package->save();
                }
            }
        }

        return view('backend.manager.page.packages.index', compact('packages','branch_id', 'departure_id', 'branch','starts','ends','sendmessage'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        // dd($package->ptype->package_type);
        $branches = Branch::get();
        // if(Auth::users() == )
        // @dd(Auth::user());
        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();
        $departure_id = $branch->id;
        $destination_id = $package->destination_id;

        $destination = Branch::where('id', '=', $destination_id)->first();
        $package_type = PType::get()->first();

        //select option get data connect to view
        //
        $package_types = Ptype::get();
        // dd($branches);
        //   dd($destination);
       $status=[] ;
            if($departure_id==$package->departure_id){
                // $status=Package::where('status', '=','Pending')->orWhere('package_type', '=','Shipped');
                $status[0]="Pending";
                $status[1]="Shipped";
            }else{
                // $status=Package::where('status', '=','Received')->orWhere('package_type', '=','Completed');
                $status[0]="Received";
                $status[1]="Completed";
            }
        

        // $package_types = $package->package_type;

        return view('backend.manager.page.packages.edit', compact('package', 'branches', 'branch', 'departure_id', 'destination_id', 'destination','package_types','status'));
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
        // dd($request);
        $request->validate([
            'sender_phone' => 'required',
            'receiver_phone' => 'required',
            'departure_id' => 'required',
            'destination_id' => 'required',
            'status' => 'required',
            'pay_status' => 'required',
            'sender_email' => 'required',
            'receiver_email' => 'required',
            'package_price'=> 'required',
            'ptype'=> 'required',
            'delivery_charge'=> 'required',
            'product_description'=> 'required',
            'special_instruction'=> 'required',
            'weight'=> 'required',

        ]);

        //    dd($request);
        $package->update($request->all());
        // return ('Package updated successfully.');
        return redirect()->route('packages.index')
            ->with('message', 'Package updated successfully.');
    }


    // /**
    //  * Update the specified status in packages.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */

    // public function updateStatus(Request $request, $id)
    // {
    //     $good = Goods::find($id);
    //     $good->status = $request->status;
    //     $good->save();
    //      return 'Package status updated successfully.';
    // }

    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // $sheet->setCellValue('A1', 'reference_number');
        $sheet->setCellValue('A1', 'id');
        $sheet->setCellValue('B1', 'sender_phone');
        $sheet->setCellValue('C1', 'receiver_phone');
        $sheet->setCellValue('D1', 'departure');
        $sheet->setCellValue('E1', 'destination');
        // $sheet->setCellValue('F1', 'status');
        $sheet->setCellValue('F1', 'pay_status');
        $sheet->setCellValue('G1', 'total_fee');
        $sheet->setCellValue('H1', 'total_items');

        $packages = Package::get();
        $rows = 2;

        $user_id = Auth::user()->id;
        $branch = Branch::where('user_id', '=', $user_id)->first();

        foreach ($packages as $package) {


            $destination_id = $package->destination_id;
            $destination = Branch::where('id', '=', $destination_id)->first();

            // $sheet->setCellValue('A' . $rows, $package['reference_number']);
            $sheet->setCellValue('A' . $rows, $package['id']);
            $sheet->setCellValue('B' . $rows, $package['sender_phone']);
            $sheet->setCellValue('C' . $rows, $package['receiver_phone']);
            $sheet->setCellValue('D' . $rows, $branch->b_name);
            $sheet->setCellValue('E' . $rows, $destination->b_name);
            // $sheet->setCellValue('F' . $rows, $package['status']);
            $sheet->setCellValue('F' . $rows, $package['pay_status']);
            $sheet->setCellValue('G' . $rows, $package['total_fee']);
            $sheet->setCellValue('H' . $rows, $package['total_item']);

            $rows++;
        }


        $writer = new Xlsx($spreadsheet);
        $writer->save('report/PackageReport.xlsx');

        return redirect()->route('packages.index')
            ->with('message', 'Excel exported successfully.');
    }




    public function destroy(Package $package)
    {
        // $package=Package::find($id);
       
        //delete all goods with package ID
        $package->delete();

        return redirect()->route('packages.index')
            ->with('message', 'Package deleted successfully');
    }

    // public function updateStatus(Request $request)
    // {
    //     dd($request);
    //     $package = Package::find($id);
    //     $package->status = $request->status;

    //     return redirect()->route('packages.index');
    // }
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
