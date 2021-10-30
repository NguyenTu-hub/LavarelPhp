 @extends('admin_layout')
 @section('admin_content')
 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Information Customer
    </div>
    <div class="table-responsive">
         <?php
           $message=Session::get('message');
              if($message){
              echo '<span class="text-alert">',$message,'</span>';
               Session::put('message',null);
               }
          ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Customer Name</th>
            <th>Address</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>{{$order_by_id->customer_name}}</td>
             <td>{{$order_by_id->customer_phone}}</td>
          </tr>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Information Shipping
    </div>
    <div class="table-responsive">
         <?php
           $message=Session::get('message');
              if($message){
              echo '<span class="text-alert">',$message,'</span>';
               Session::put('message',null);
               }
          ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Shipping Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>{{$order_by_id->shipping_name}}</td>
             <td>{{$order_by_id->shipping_address}}</td>
             <td>{{$order_by_id->shipping_phone}}</td>
          </tr>
         
        </tbody>
      </table>
    </div>
  </div>
</div>
<br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIST DETAIL ORDER PRODUCT
    </div>

    <div class="table-responsive">
         <?php
           $message=Session::get('message');
              if($message){
              echo '<span class="text-alert">',$message,'</span>';
               Session::put('message',null);
               }
          ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total Price</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
           
            <td>{{$order_by_id->Product_name}}</td>
             <td>{{$order_by_id->Product_sale_quantity}}</td>
              <td>{{$order_by_id->Product_price}}</td>
              <td>{{$order_by_id->order_total}}</td>

          </tr>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
 @endsection