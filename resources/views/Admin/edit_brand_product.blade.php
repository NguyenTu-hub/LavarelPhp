 @extends('admin_layout')
 @section('admin_content')
 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            EDIT_brand_PRODUCT
                        </header>
                        <div class="panel-body">
                                <?php
                                 $message=Session::get('message');
                                    if($message){
                                        echo '<span class="text-alert">',$message,'</span>';
                                        Session::put('message',null);
                                    }
                                ?>
                                @foreach($edit_brand_product as $key=>$ed_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update_brand_product/'.$ed_value->Brand_id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" value="{{$ed_value->Brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="Description" id="exampleInputPassword1">{{$ed_value->Brand_desc}}</textarea>
                                </div>
                                <button type="submit" name="update_brand" class="btn btn-info">Update</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection