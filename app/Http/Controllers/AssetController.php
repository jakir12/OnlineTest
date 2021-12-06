<?php

namespace App\Http\Controllers;

use App\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $assetList = Asset::all();
        return view('assets.manage_asset',['assetInfo' => $assetList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assets.add_asset');
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
        $asset_info = new Asset();

        $asset_name =  $asset_info->asset_name = $request->asset_name;
        $asset_info->category_id = $request->category_id;

        $value = Asset::where('asset_name', '=', $asset_name)->first();  

        if ($value === null) {
            $asset_info->save();

            return redirect('/add-asset')->with('successMsg', 'Save Successfully.'); 
        }else{
            return redirect('/add-asset')->with('errorMsg', 'Sorry Duplicate entry.'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        //
    }
    
    public function formValidation($request){
        $this->validate($request,[
            'asset_name' => 'required',
        ]);
    }
}
