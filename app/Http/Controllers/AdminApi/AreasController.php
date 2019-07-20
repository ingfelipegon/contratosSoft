<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Http\Resources\AreaResource;
use Illuminate\Http\Request;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        return AreaResource::collection($areas);
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $data = $request->all();
        $area->update($data);

        return response(['message'=>'Area actualizada', 'area'=>$area]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return response()->json(['data'=>$area], 200);
    }
}
