<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\jointableValidation;
use DB;

class JoinTableController extends Controller
{
        public function index()
        {
            $appdetails = DB::table('appdetails'); 
            $appdetails = $appdetails->get();

            $querydetails = DB::table('appdetails')
                        ->join('apps', 'apps.app_id', '=', 'appdetails.app_id')
                        ->join('items', 'items.id', '=', 'appdetails.item_id')
                        ->join('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
                        ->select('apps.app_type', 'apps.app_year', 'apps.quarter','items.item_name','items.item_description','mops.mop_name')
                        ->get();

            return view('/welcome',['appdetails'=> $appdetails, 'querydetails'=> $querydetails]); 
        }

        public function unconsolidated()
        {
            //$unconsolidateditems = DB::table('appdetails'); 
            //$unconsolidateditems = $unconsolidateditems->get();

            $queryunconsolidateditems = DB::table('appdetails')
            ->leftJoin('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->leftJoin('items', 'items.id', '=', 'appdetails.item_id') 
            ->rightjoin('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->rightjoin('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id')
            ->rightjoin('account', 'account.acc_id', '=', 'appdetails.acc_id') 
              ->where('appdetails.remarks', '=', 'unconsolidated')
             
                ->get();

        //$queries = \DB::getQueryLog();


         //dd($queryunconsolidateditems);

            return view('/unconsolidated', compact('queryunconsolidateditems'));  

        }

    public function search(jointableValidation $request)
    {
        $type = $request->input('select_app_type');
        $quarter = $request->input('quarter');
        $year = $request->input('year');

       

        //\DB::connection()->enableQueryLog();
        
       
        
        if($quarter == "Annual"){
            $datas = DB::table('appdetails')
            ->leftJoin('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->leftJoin('items', 'items.id', '=', 'appdetails.item_id') 
            ->rightjoin('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->rightjoin('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id') 
            ->rightjoin('account', 'account.acc_id', '=', 'appdetails.acc_id') 
            ->where('apps.app_year', '=', $year)
            ->where('apps.app_type', '=', $type)
            ->where('appdetails.remarks', '=', 'consolidated')  
            ->get();


        }
        else{
            $datas = DB::table('appdetails')
                ->leftJoin('apps', 'apps.app_id', '=', 'appdetails.app_id') 
                ->leftJoin('items', 'items.id', '=', 'appdetails.item_id') 
                ->rightjoin('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
                ->rightjoin('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id')
                ->rightjoin('account', 'account.acc_id', '=', 'appdetails.acc_id') 
                ->where('apps.quarter', '=', $quarter)  
                ->where('apps.app_year', '=', $year)
                ->where('apps.app_type', '=', $type)
                ->where('appdetails.remarks', '=', 'consolidated') 
                ->get();

        }
        

        
         
          
        //$queries = \DB::getQueryLog();
 
        //dd($datas);

        
        return view('/data',compact('datas'));
    }

    public function changetoconsolidate(Request $request)
    {
        $id[] = $request->input('row[]');
        $remark = DB::table('appdetails')
        ->where('appdetails_id', $id[])
        ->update(array('remarks' => 'consolidated'));
        
        return redirect('/unconsolidated')->with('success', 'Remarks was  successfully updated');
    }
    
    public function show(Request $request)
    {
        return view('/welcome');
    }
    

     
}
