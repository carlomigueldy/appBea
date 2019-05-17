@extends('layouts.app')

@section('content')
  <h1>Unconsolidated</h1>
  <hr>
  <form method="POST" action="JoinTableController@changetoconsolidate">
      <table class="table table-fixed-head table-striped">
        <thead class="thead-dark">
            <th>No.</th>
            <th>Item Name</th> 
            <th>Item description</th>
            <th>Specification</th>
            <th>Unit</th>
            <th>Unit price</th>
            <th>Quantity</th>
            <th>Amount</th> 
            <th>Cost Center</th> 
            <th>Mode of Procurement</th> 
            <th>Account No.</th>
            <th>Lot</th> 
            <th>Remarks</th> 
            <th>Action</th> 
        </thead>
        <tbody> <?php $count = 1;?>
          @foreach($queryunconsolidateditems as $queryunconsolidateditem )
            <tr>
              <td>{{$count}}</td>  
              <td>{{$queryunconsolidateditem->item_name}}</td>  
              <td>{{$queryunconsolidateditem->item_description}}</td>  
              <td>{{$queryunconsolidateditem->app_specification}}</td>  
              <td>{{$queryunconsolidateditem->app_unit}}</td>  
              <td>Php{{$queryunconsolidateditem->app_unit_price}}</td>  
              <td>{{$queryunconsolidateditem->quantity}}</td>  
              <td>Php{{$queryunconsolidateditem->amount}}</td>  
              <td>{{$queryunconsolidateditem->costcenter_name}}</td>  
              <td>{{$queryunconsolidateditem->mop_name}}</td>  
              <td>{{$queryunconsolidateditem->acc_no}}</td>    
              <td>{{$queryunconsolidateditem->lot_no}}</td>  
              <td>{{$queryunconsolidateditem->remarks}}</td>     
              {{-- <td><form method="GET" action=" {{url('utc', $queryunconsolidateditem->appdetails_id)}} "> --}}
              <td>
                <input type="checkbox" value="{{$queryunconsolidateditem->appdetails_id}}" name="row[]">
              </td>     
            </tr><?php $count += 1; ?>
          @endforeach    
        </tbody>
      </table>
      <input type="submit" values="Submit" class="btn btn-success float-right">
    </form>
@endsection
