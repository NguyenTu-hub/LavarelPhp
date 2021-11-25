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
            <th>Phone</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>{{$customer->customer_name}}</td>
             <td>{{$customer->customer_phone}}</td>
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
            <th>Notes</th>
            <th>Payment method</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
         
          <tr>
            <td>{{$shipping->shipping_name}}</td>
             <td>{{$shipping->shipping_address}}</td>
             <td>{{$shipping->shipping_note}}</td>
             <td>@if($shipping->shipping_method==0)Paypal @else Cash Payment @endif</td>
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
            <th>ordinal</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>FeeShip</th>
            <th>Total Price</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
            $i=0;
            $total=0;
          @endphp
          @foreach($order_detail as $key=>$detail)
          @php
          $i++;
          $subtotal=$detail->Product_price*$detail->Product_sale_quantity;
          $total+=$subtotal;
          @endphp
          <tr>
            <td>{{$i}}</td>
            <td>{{$detail->Product_name}}</td>
             <td>{{$detail->Product_sale_quantity}}</td>
              <td>{{$detail->Product_price.' '.'vnd'}}</td>
              <td>{{$detail->product_fee.' '.'vnd'}}</td>
              <td>{{$detail->Product_price*$detail->Product_sale_quantity.' '.'vnd'}}</td>

          </tr>
          @endforeach
          <tr>
            <td>Pay:{{$total+$detail->product_fee.' '.'vnd'}}</td>
          </tr>
        </tbody>
      </table>
      <a class="btn btn-info" target="_blank" href="{{url('/print_order/'.$detail->order_code)}}">Print order </a>
    </div>
  </div>
</div>
 @endsection