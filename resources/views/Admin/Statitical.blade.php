 @extends('admin_layout')
 @section('admin_content')
<div class="container-fluid">
    <style type="text/css">
      p.title_statitical{
        text-align: center;
        font-size: 20px;
        font-weight: bold;
      }

    </style>
<div class="row">
  <p  class="title_statitical">Statitical</p>
  <form autocomplete="off">
    @csrf
    <div class="col-md-2">
      <p>StartDate:<input type="text" id="datepicker" class="form-control"></p>
      <input type="button" id="filter" class="btn btn-primary btn-sm" value="Filter">
    </div>
    <div class="col-md-2">
      <p>EndDate:<input type="text" id="datepicker2" class="form-control"></p>
    </div>
  </form>
  <div class="col-lg-12">
    <div id="thongke" style="height: 250px;"></div>
  </div>

</div>
</div>
 @endsection