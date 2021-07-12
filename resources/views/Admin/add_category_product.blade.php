 @extends('admin_layout')
 @section('admin_content')
 <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            ADD_CATEGORY_PRODUCT
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
                                <form role="form" action="{{URL::to('/save_category_product')}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" name="catergory_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter category product">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="Description" id="exampleInputPassword1" placeholder="Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Display</label>
                                   <select name="category_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hidden</option>
                                        <option value="1">Show</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_category" class="btn btn-info">Add</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection