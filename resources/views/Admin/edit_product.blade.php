 @extends('admin_layout')
 @section('admin_content')
 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            UPDATE_PRODUCT
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
                                @foreach($edit_product as $key=>$pro)
                                <form role="form" action="{{URL::to('/update_product/'.$pro->Product_id)}}" method="post"enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->Product_name}}">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" value="{{$pro->Product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/upload/products/'.$pro->Product_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="Description" id="exampleInputPassword1" >{{$pro->Product_desc}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Content</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="content" id="exampleInputPassword1" >{{$pro->Product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Brand Product</label>
                                   <select name="product_brand" class="form-control input-sm m-bot15">
                                         @foreach($brand_product as $key=>$brand)
                                            @if($brand->Brand_id==$pro->Brand_id)
                                            <option selected value="{{$brand->Brand_id}}">{{$brand->Brand_name}}</option>
                                            @else
                                             <option value="{{$brand->Brand_id}}">{{$brand->Brand_name}}
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Category Product</label>
                                   <select name="product_category" class="form-control input-sm m-bot15">   
                                    @foreach($cate_product as $key=>$cate)
                                         @if($cate->category_id==$pro->Catergory_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                            @else
                                             <option value="{{$cate->category_id}}">{{$cate->category_name}}
                                            @endif
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
                                <button type="submit" name="add_category" class="btn btn-info">update product</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection