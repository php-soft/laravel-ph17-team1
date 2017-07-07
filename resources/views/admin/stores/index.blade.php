@extends('admin.layouts.master')    
@section('content')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <div class="container">
          <h2>QUẢN LÝ KHO</h2>
          <ul class="nav nav-tabs">
            <li  class="active"><a data-toggle="tab" href="#home">Tồn kho </a></li>
            <li><a data-toggle="tab" href="#menu1">Nhập xuất tồn</a></li>
          </ul>

          <div class="tab-content" style="padding-top: 10px;">
            <div id="home" class="tab-pane fade in active">
            <div>
                <!--<div class="form-group pull-left ">
                  <input type="text" class="form-control" placeholder="Nhập tên hoặc mã hàng để tìm kiếm " style="width: 300px;">
                </div-->
                <div class="dropdown pull-left ">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-left: 5px;">
                    --Loại hàng--   
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Điện thoại</a></li>
                    <li><a href="#">Phụ kiện</a></li>
                  </ul>
                </div>
                <div class="dropdown pull-left ">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-left: 5px;">
                    --Lọc-- 
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Hàng đổi trả</a></li>
                    <li><a href="#">Chỉ lấy hàng tồn</a></li>
                    <li><a href="#">Hết hàng</a></li>
                    <li><a href="#">Sắp hết hàng</a></li>
                    <li><a href="#">Tồn kho lâu</a></li>
                  </ul>
                </div>
                <div class="pull-left" style="margin-left: 5px;">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search"></span>
                    Xem </button>
                </div>
                <div class="pull-left" style="margin-left: 5px;">
                    <button type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-download"></span>
                    Xuất Excel</button>
                </div>
                <div class="dataTables_wrapper" style="padding-top: 15px;">
                    <table id="example" class="display" cellspacing="10" width="100%">
                        <thead>
                            <tr>
                                <th>Mã hàng</th>
                                <th>Tên hàng</th>
                                <th>Số lượng</th>
                                <th>Vốn tồn kho</th>
                                <th>Giá trị tồn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>400</td>
                                <td>450</td>
                            </tr>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>400</td>
                                <td>450</td>
                            </tr>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>400</td>
                                <td>450</td>
                            </tr>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>400</td>
                                <td>450</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <div>
                <div class="form-group pull-left ">
                  <input type="text" class="form-control" placeholder="Nhập tên hoặc mã hàng để tìm kiếm " style="width: 300px;">
                </div>
                <div class="dropdown pull-left ">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-left: 5px;">
                    --Loại hàng--   
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Điện thoại</a></li>
                    <li><a href="#">Phụ kiện</a></li>
                  </ul>
                </div>
                <div class="dropdown pull-left ">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="margin-left: 5px;">
                    --Lọc-- 
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Hàng đổi trả</a></li>
                    <li><a href="#">Chỉ lấy hàng tồn</a></li>
                    <li><a href="#">Hết hàng</a></li>
                    <li><a href="#">Sắp hết hàng</a></li>
                    <li><a href="#">Tồn kho lâu</a></li>
                  </ul>
                </div>
                <div class="pull-left" style="margin-left: 5px;">
                    <button type="button" class="btn btn-primary">
                        <span class="glyphicon glyphicon-search"></span>
                    Xem </button>
                </div>
                <div class="pull-left" style="margin-left: 5px;">
                    <button type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-download"></span>
                    Xuất Excel</button>
                </div>
                <div class="dataTables_wrapper" style="padding-top: 15px;">
                    <table id="example" class="display" cellspacing="10" width="100%">
                        <thead>
                            <tr>
                                <th>Mã hàng</th>
                                <th>Tên hàng</th>
                                <th>Số lượng nhập </th>
                                <th>Số lượng xuất</th>
                                <th>Tồn kho </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>450</td>
                            </tr>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>400</td>
                            </tr>
                            <tr>
                                <td>HTCA1</td>
                                <td>HTC One</td>
                                <td>4</td>
                                <td>400</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
            </div>
          </div>
    </div>
@stop
