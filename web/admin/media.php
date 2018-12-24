<!DOCTYPE HTML>
<html>
<head>
<?php include('modules/head.php') ?>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include('modules/header.php') ?>
        <div id="page-wrapper">
        <div class="graphs">
	   <div class="widget_head">Thêm sản phẩm</div>

	   <div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form action="modules/xuly.php" method="post" enctype="multipart/form-data" class="form-horizontal">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Hình sản phẩm</label>
									<div class="col-sm-8">
										<input type="file" class="form-control1" id="focusedinput" name="hinhanh">
									</div>
									<div class="col-sm-2">
										<p class="help-block">Chọn hình bạn thích</p>
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Tên sản phẩm</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="inputPassword" placeholder="Nhập tên sản phẩm" name="tensanpham">
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Giá sản phẩm</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="inputPassword" placeholder="Nhập giá sản phẩm" name="giasanpham" style="width: 90%"> đ
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Mức khuyến mãi</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="inputPassword" name="khuyenmai" style="width: 30%"> %
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Thể loại</label>
									<div class="col-sm-8"><select name="theloai" id="selector1" class="form-control1">
										<option value="Pizza">Pizza</option>
										<option value="Khai vị">Khai vị</option>
										<option value="Thức uống">Thức uống</option>
									</select></div>
								</div>
								
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
									<div class="col-sm-8"><textarea name="mota" id="txtarea1" cols="50" rows="40" class="form-control1" placeholder="Nhập mô tả"></textarea></div>
								</div>

								<div class="panel-footer">
										<div class="row">
											<div class="col-sm-8 col-sm-offset-2">
												<button class="btn-success btn" name="add">Thêm sản phẩm</button>
											</div>
										</div>
	 							</div>

							</form>
						</div>
					</div>

	    <div class="copy_layout">
         <p>Copyright © 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
        </div>	
    </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
