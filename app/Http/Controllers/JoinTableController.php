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

            return view('welcome',['appdetails'=> $appdetails, 'querydetails'=> $querydetails]); 
        }

        public function unconsolidated()
        {
            $queryunconsolidateditems = DB::table('appdetails')
            ->join('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->join('items', 'items.id', '=', 'appdetails.item_id') 
            ->join('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->join('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id')
            ->join('account', 'account.acc_id', '=', 'appdetails.acc_id') 
            ->select('items.item_name', 'items.item_description', 
            'appdetails.app_unit', 
            'appdetails.app_unit_price',
            'appdetails.quantity', 
            'appdetails.amount', 
            'costcenters.costcenter_name',
            'appdetails.appdetails_id',
            'mops.mop_name','account.acc_no', 'appdetails.remarks')
            ->where('appdetails.remarks', '=', 'unconsolidated')
            // ->get();
            ->paginate(5);

            return view('unconsolidated', compact('queryunconsolidateditems'));  
        }

    public function search(jointableValidation $request)
    {
        $type = $request->input('select_app_type');
        $quarter = $request->input('quarter');
        $year = $request->input('year');
        
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
            // ->paginate(5);  
            ->get();
        }else{
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
            // ->paginate(5);
            ->get();
        }

        return view('/data')->with('datas', $datas)->with('type', $type)->with('quarter', $quarter)->with('year', $year);
    }

    public function changetoconsolidate(Request $request)
    {
        $id[] = $request->input('row[]');
        $remark = DB::table('appdetails')
        ->where('appdetails_id', $id[])
        ->update(array('remarks' => 'consolidated'));
        
        return redirect('/consolidated')->with('success', 'Remarks was successfully updated');
    }
    
    public function show(Request $request)
    {
        return view('/welcome');
    }

    public function update(Request $request)
    {
        $appdetails_id = $request->input('appdetails_id');
        if(is_array($appdetails_id)){
            foreach($appdetails_id as $id){
                DB::table('appdetails')
                ->where('appdetails_id', $id)
                ->update(['remarks' => 'consolidated']);
            }
        }

        return redirect('/');
    }
}
