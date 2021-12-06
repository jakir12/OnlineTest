<?php

namespace App\Http\Controllers;

use App\AssetCategory;
use Illuminate\Http\Request;

class AssetCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assetCatList = AssetCategory::all();
        return view('assets.asset_category',['assetCatInfo' => $assetCatList]);
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
        $this->formValidation($request);
        $cat_info = new AssetCategory();

        $asset_category =  $cat_info->asset_category = $request->asset_category;
        $value = AssetCategory::where('asset_category', '=', $asset_category)->first();  

        if ($value === null) {
            $cat_info->save();
            return redirect('/category-list')->with('successMsg', 'Save Successfully.'); 
        }else{
            return redirect('/category-list')->with('errorMsg', 'Sorry Duplicate entry.'); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AssetCategory $assetCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetCategory $assetCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetCategory $assetCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssetCategory  $assetCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssetCategory $assetCategory)
    {
        //
    }

    public function formValidation($request){
        $this->validate($request,[
            'asset_category' => 'required',
        ]);
   }
}
