 @extends('admin_layout')
 @section('admin_content')
 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD_PRODUCT
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
                                <form role="form" action="{{URL::to('/save_product')}}" method="post"enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter  product">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter price product">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="Description" id="exampleInputPassword1" placeholder="Description"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Content</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="content" id="exampleInputPassword1" placeholder="Description content"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Brand Product</label>
                                   <select name="product_brand" class="form-control input-sm m-bot15">
                                         @foreach($brand_product as $key=>$brand)
                                        <option value="{{$brand->Brand_id}}">{{$brand->Brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Category Product</label>
                                   <select name="product_category" class="form-control input-sm m-bot15">   @foreach($cate_product as $key=>$cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Display</label>
                                   <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hidden</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category" class="btn btn-info">Add product</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection