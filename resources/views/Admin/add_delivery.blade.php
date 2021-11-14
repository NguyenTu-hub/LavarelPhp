 @extends('admin_layout')
 @section('admin_content')
 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD_DELIVERY
                        </header>
                        <div class="panel-body">
                                <?php
                                 $message=Session::get('message');
                                    if($message){
                                        echo '<span class="text-alert">',$message,'</span>';
                                        Session::put('message',null);
                                    }
                                ?>
                            <div class="position-center">
                                <form>
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose a City</label>
                                   <select name="City" id="city" class="form-control input-sm m-bot15 choose city">
                                        <option value="">Choose a city</option>
                                        @foreach($city as $key=>$ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose a Province</label>
                                   <select name="Province" id="province" class="form-control input-sm m-bot15 province choose">
                                        <option value="">Choose a Province</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Choose a Ward</label>
                                   <select name="Ward" id="wards" class="form-control input-sm m-bot15 wards">
                                         <option value="">Choose a Ward</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fee Ship</label>
                                    <input type="text" name="fee_ship" class="form-control feeship" id="exampleInputEmail1" placeholder="Enter category product">
                                </div>
                                <button type="button" name="btn_delivery" class="btn btn-info btn_delivery">Add fee ship</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection