 @extends('admin_layout')
 @section('admin_content')
 <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIST ORDER
    </div>
    <div class="row w3-res-tb">
      
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
            <th>Order code</th>
            <th>Status</th>
            <th>Created At</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php
          $i=0;
          @endphp
          @foreach($order as $key=>$ord)
          @php
            $i++;
          @endphp
          <tr>
            <td><label><i>{{$i}}</i></label></td>
            <td>{{$ord->order_code}}</td>
            <td>@if($ord->order_status==1)
                      New orders
                @else
                      Processed

                @endif
            </td>
            <td>{{$ord->created_at}}</td>
            <td>
              <a href="{{URL::to('/view_order/'.$ord->order_code)}}" class="active" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i>
              </a>
              <a onclick="return confirm('Are you sure to delete?')" href="{{URL::to('/deleted_order/'.$ord->order_code)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach       
        </tbody>
      </table>
    </div>
  </div>
</div>
 @endsection