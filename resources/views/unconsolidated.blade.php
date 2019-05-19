@extends('layouts.app')

@section('content')
  <h1>Unconsolidated</h1>
  <hr>
  <form method="POST" action="{{ action('JoinTableController@update') }}">
      @csrf @method('PUT')
      <table class="table table-sm table-bordered table-fixed-head table-striped">
        <thead class="thead-dark">
          <th>#</th>
          <th>Item Name</th> 
          <th>Item description</th>
          {{-- <th>Specification</th> --}}
          <th>Unit</th>
          <th>Unit price</th>
          <th>Quantity</th>
          <th>Amount</th> 
          <th>Cost Center</th> 
          <th>Mode of Procurement</th> 
          <th>Account No.</th>
          <th>Remarks</th> 
          <th>Action</th> 
      </thead>
      <tbody> <?php $count = 1;?>
        @foreach($queryunconsolidateditems as $queryunconsolidateditem )
          <tr>
            <td>{{$queryunconsolidateditem->appdetails_id}}</td>  
            <td>{{$queryunconsolidateditem->item_name}}</td>  
            <td>{{$queryunconsolidateditem->item_description}}</td>  
            {{-- <td>{{$queryunconsolidateditem->app_specification}}</td>   --}}
            <td>{{$queryunconsolidateditem->app_unit}}</td>  
            <td>Php {{$queryunconsolidateditem->app_unit_price}}</td>  
            <td>{{$queryunconsolidateditem->quantity}}</td>  
            <td>Php {{$queryunconsolidateditem->amount}}</td>  
            <td>{{$queryunconsolidateditem->costcenter_name}}</td>  
            <td>{{$queryunconsolidateditem->mop_name}}</td>  
            <td>{{$queryunconsolidateditem->acc_no}}</td>    
            {{-- <td>{{$queryunconsolidateditem->lot_no}}</td>   --}}
            <td>{{$queryunconsolidateditem->remarks}}</td>     
              {{-- <form method="GET" action=" {{url('utc', $queryunconsolidateditem->appdetails_id)}} ">
                <input type="submit" value="{{$queryunconsolidateditem->appdetails_id}}">
              </form> --}}
            <td>
              <input type="checkbox" value="{{$queryunconsolidateditem->appdetails_id}}" name="appdetails_id[]">
            </td>     
          </tr><?php $count += 1; ?>
        @endforeach    
      </tbody>
    </table>
    <hr>
    <input type="submit" values="Submit" class="btn btn-success float-right">
  </form>
  {{$queryunconsolidateditems->links()}}
@endsection
