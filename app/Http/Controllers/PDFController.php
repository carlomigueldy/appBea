<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class PDFController extends Controller
{
    public function downloadPDF(Request $request){
        $type = $request->input('select_app_type');
        $quarter = $request->input('quarter');
        $year = $request->input('year');
        
        if($quarter == "Annual"){
            $datas = DB::table('appdetails')
            ->join('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->join('items', 'items.id', '=', 'appdetails.item_id') 
            ->join('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->join('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id') 
            ->join('account', 'account.acc_id', '=', 'appdetails.acc_id') 
            ->where('apps.app_year', $year)
            ->where('apps.app_type', $type)
            ->where('appdetails.remarks', 'consolidated')
            ->get();

            $pdf = PDF::loadView('pdf', compact('datas'));
            return $pdf->download('invoice.pdf');
        }else{
            $datas = DB::table('appdetails')
            ->join('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->join('items', 'items.id', '=', 'appdetails.item_id') 
            ->join('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->join('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id')
            ->join('account', 'account.acc_id', '=', 'appdetails.acc_id') 
            ->where('apps.quarter', $quarter)  
            ->where('apps.app_year', $year)
            ->where('apps.app_type', $type)
            ->where('appdetails.remarks', 'consolidated') 
            ->get();

            $pdf = PDF::loadView('pdf', compact('datas'));
            return $pdf->download('invoice.pdf');
        }
      }

      public function pdfview(Request $request)
    {
        // $items = DB::table("items")->get();
        // view()->share('items',$items);

        $type = $request->input('select_app_type');
        $quarter = $request->input('quarter');
        $year = $request->input('year');

        if($quarter == "Annual"){
            $datas = DB::table('appdetails')
            ->join('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->join('items', 'items.id', '=', 'appdetails.item_id') 
            ->join('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->join('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id') 
            ->join('account', 'account.acc_id', '=', 'appdetails.acc_id') 
            ->where('apps.app_year', $year)
            ->where('apps.app_type', $type)
            ->where('appdetails.remarks', 'consolidated')
            ->get();

            view()->share('datas',$datas);
        }else{
            $datas = DB::table('appdetails')
            ->join('apps', 'apps.app_id', '=', 'appdetails.app_id') 
            ->join('items', 'items.id', '=', 'appdetails.item_id') 
            ->join('mops', 'mops.mop_id', '=', 'appdetails.mop_id')
            ->join('costcenters', 'costcenters.costcenter_id', '=', 'appdetails.costcenter_id')
            ->join('account', 'account.acc_id', '=', 'appdetails.acc_id') 
            ->where('apps.quarter', $quarter)  
            ->where('apps.app_year', $year)
            ->where('apps.app_type', $type)
            ->where('appdetails.remarks', 'consolidated') 
            ->get();

            view()->share('datas',$datas);
        }


        if($request->has('download')){
            $pdf = PDF::loadView('pdf');
            return $pdf->download('consolidations.pdf');
        }
        return view('pdf');
    }
}
