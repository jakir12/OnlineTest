<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Allocation;
use App\Asset;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssetAllocation;

class AllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allocations = DB::table('allocations')
                        ->leftJoin('assets', 'allocations.asset_id', '=', 'assets.id')
                        ->leftJoin('users', 'allocations.employee_id', '=', 'users.id')
                        ->select('allocations.*', 'assets.asset_name','users.name')
                        ->orderBy('allocations.id', 'DESC')
                        ->get(); 
        return view('allocation.allocation_list',['allocations' => $allocations]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function remainingAsset()
    {
        $assetInfo = Asset::where('allocated_status', '=', '0')->get(); 
        return view('allocation.remaining_assets',['assetInfo' => $assetInfo]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assetList = Asset::where('allocated_status', '=', '0')->get(); 
        $userList = User::where('user_type', '=', '2')->get(); 

        return view('allocation.add_allocation',['assetList' => $assetList,'userList' => $userList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->formValidation($request);
        $allocation_info = new Allocation();
        
        $asset_id = $allocation_info->asset_id  = $request->asset_id ;
        $employee_id = $allocation_info->employee_id  = $request->employee_id ;
        $allocation_info->allocation_date = $request->allocation_date;
        $user_id = Auth::user()->id;
        $allocation_info->allocated_by = $user_id;

        $empEmail = DB::table('users')
                ->where('id', $employee_id)
                ->first();
        $empMail = $empEmail->email;
        $empName = $empEmail->name;
        $data = array("empName"=>$empName);

        Mail::to($empMail)->send(new AssetAllocation($data));

        $userEmail = DB::table('users')
                ->where('id', $user_id)
                ->first();
                
        $adminMail = $userEmail->email;
        $adminName = $userEmail->name;
        $data2 = array("empName"=>$adminName);
        Mail::to($adminMail)->send(new AssetAllocation($data2));

        $checkDup = DB::table("allocations")
                ->where('asset_id', '=', $asset_id)
                // ->where('employee_id', '=', $employee_id)  // if we need to check with employee.
                ->first();

        if ($checkDup === null) {       
            $updateAsset = DB::table('assets')
                ->where('id', $asset_id)
                ->update(['allocated_status' => '1']);
            if($updateAsset){
                $allocation_info->save();
                return redirect('/add-allocation')->with('successMsg', 'Save Successfully.');                      
            } else {
                return redirect('/add-allocation')->with('errorMsg', 'Sorry Allocation not updated.'); 
            }
            
            
        }else {
            return redirect('/add-allocation')->with('errorMsg', 'Sorry this is product is already allocated.');
        }
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function show(Allocation $allocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Allocation $allocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Allocation $allocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Allocation  $allocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Allocation $allocation)
    {
        //
    }

    public function formValidation($request){

        $this->validate($request,[
            'asset_id' => 'required',
            'employee_id' => 'required',
            'allocation_date' => 'required',
        ]);
    }
}
