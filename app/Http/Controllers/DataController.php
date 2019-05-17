<?php

namespace App\Http\Controllers;

use App\Data;
use Illuminate\Http\Request;
use App\Http\Requests\dataValidation;

class DataController extends Controller
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
        //
    }

    public function search(dataValidation $request)
    {
        $type = $request->input('select_app_type');
        $quarter = $request->input('quarter');
        $year = $request->input('year');

        \DB::connection()->enableQueryLog();
        
        /*
        $querydetails = DB::table('appdetails')
        ->join('apps', 'apps.app_id', '=', 'appdetails.app_id')
        ->join('items', 'items.id', '=', 'appdetails.item_id')
        ->join('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
        ->where('apps.app_year', '=', $year)
        ->where('apps.quarter', '=', $quarter)
        ->where('apps.app_type', '=', $type)
        ->select('apps.app_type', 'apps.app_year', 'apps.quarter','items.item_name','items.item_description','mops.mop_name')
        ->get(); 
        */
        
        $datas = DB::table('appdetails')
            ->leftJoin('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->leftJoin('items', 'items.id', '=', 'appdetails.item_id') 
            ->rightjoin('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->where('apps.quarter', '=', $quarter)  
            ->where('apps.app_year', '=', $year)
            ->where('apps.app_type', '=', $type)
            ->get();

         
          
        //$queries = \DB::getQueryLog();
 
        //dd($users);

        return view('/data', ['datas' => $datas]);
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
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }
}
