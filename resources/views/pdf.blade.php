@extends('layouts.pdf')

@section('content')
<h1>Consolidations</h1>
@foreach($datas as $row)
    <h6>Year: {{$row->app_year}}</h6>
    <h6>Type: {{$row->app_type}}</h6>
    <h6>Quarter: {{$row->quarter}}</h6>
@endforeach
<hr>
<table class="table table-sm table-bordered">
    <thead>
        <th>#</th>
        <th>Item Name</th> 
        {{-- <th>Item description</th> --}}
        {{-- <th>Specification</th> --}}
        <th>Unit</th>
        <th>Unit price</th>
        <th>Quantity</th>
        <th>Amount</th> 
        <th>Cost Center</th> 
        <th>Mode of Procurement</th> 
        <th>Account No.</th>
        {{-- <th>Lot</th>  --}}
        {{-- <th>Remarks</th>  --}}
    </thead>
    <tbody><?php $count = 1; $grandtotal = 0; ?>
    @foreach($datas as $data)
            <tr>
                <td>{{$count}}</td>  
                <td>{{$data->item_name}}</td>  
                <td>{{$data->app_unit}}</td>  
                <td>Php{{$data->app_unit_price}}</td>  
                <td>{{$data->quantity}}</td>  
                <td>Php{{$data->amount}}</td>  
                <td>{{$data->costcenter_name}}</td>  
                <td>{{$data->mop_name}}</td>  
                <td>{{$data->acc_no}}</td>    
            </tr> 
            <?php $count += 1; $grandtotal = $grandtotal + $data->amount; ?>
    @endforeach    
        <tr>
            <td colspan="10" align="right" style="font-weight: bold;">Grand Total:</td>
            <td colspan="3" align="center">Php {{$grandtotal}}</td>
        </tr>
    </tbody> 
</table>
@endsection