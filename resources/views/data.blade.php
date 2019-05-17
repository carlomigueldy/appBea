<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!--Nav Bar-->

    <nav class="navbar-fixed-top navbar-dark" style="background: #a41d21">
        <span class="navbar-brand"><a href="/" style="text-decoration:none; color:white;"><span>Annual Procurement Plan</span></a>


      </nav>

  </head>

  <body>

  
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!--Tables-->





<div class="container">
        <table clss="table table-fixed-head table-striped" style="position: relative; top:190px;">
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
                    

                </thead>
                <tbody>

                <?php
                  $count = 1;
                  $grandtotal = 0;
                ?>

                        @foreach($datas as $data)
                          
                                <tr>
                                    <td>{{$count}}</td>  
                                    <td>{{$data->item_name}}</td>  
                                    <td>{{$data->item_description}}</td>  
                                    <td>{{$data->app_specification}}</td>  
                                    <td>{{$data->app_unit}}</td>  
                                    <td>Php{{$data->app_unit_price}}</td>  
                                    <td>{{$data->quantity}}</td>  
                                    <td>Php{{$data->amount}}</td>  
                                    <td>{{$data->costcenter_name}}</td>  
                                    <td>{{$data->mop_name}}</td>  
                                    <td>{{$data->acc_no}}</td>    
                                    <td>{{$data->lot_no}}</td>  
                                    <td>{{$data->remarks}}</td>      
                                </tr> 
                                <?php
                                  $count += 1;
                                  $grandtotal = $grandtotal + $data->amount;
                                ?>
                        @endforeach    

                  </tbody> 
                  <thead class="thead-light">
                  <th></th> 
                  <th></th> 
                  <th></th> 
                  <th></th> 
                  <th></th> 
                  <th></th> 
                  <th></th> 
                  <th></th> 
                    <th>Grand Total:</th> 
                    <th>Php{{$grandtotal}}</th> 
                </thead>
            
        </table>
        

    </div>
    
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html> 