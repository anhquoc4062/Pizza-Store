<!DOCTYPE HTML>
<html>
<head>
	<?php include('modules/head.php') ?>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
     	<?php include('modules/config.php') ?>
     	     <?php session_start() ?>
     <?php include ('modules/quyentruycap.php') ?>
	<?php include('modules/header.php') ?>

	<?php
		$sql="select * from sanpham where ID_sanpham = $_GET[id]";
		$qry=mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($qry);

 	?>
        <div id="page-wrapper">
        <div class="graphs">
	     <div class="xs">
  	       <h3>Sửa thông tin sản phẩm</h3>
  	       <a href="list-product.php?page=1" style="text-decoration: none"><div class="tinhtrang" style="background-color: #0069a8;width: 200px;height: 25px;line-height: 25px"><i class="fas fa-long-arrow-alt-left"></i> Trở về trang quản lý</div></a>
  	         <div class="tab-content">
					<div class="tab-pane active" id="horizontal-form">
						<form action="modules/xuly.php?id=<?php echo $row['ID_sanpham'] ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
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
										<input type="text" class="form-control1" id="inputPassword" placeholder="Nhập tên sản phẩm" name="tensanpham" value="<?php echo $row['Ten_sanpham'] ?>">
									</div>
								</div>

								<script type="text/javascript">
									function forGod(s){
										var tmp="";
										for(var i = 0;i<s.length;i++){
											if(s[i]!='.'){
												tmp+=s[i];
											}
										}
										s=tmp;
									    var ketqua="";
									    if(s.length<=3){
									        ketqua=s;
									    }
									    else{
									        var dem=-1;
									        for(var i=s.length-1;i>=0;--i){
									            dem++;
									        if(dem==3){
									            ketqua="."+ketqua;
									            dem=0;
									        }
									        ketqua=s[i]+ketqua;
									        }
									    }
									    return ketqua;
									}

									function Chuyen(){
										var input = document.getElementById('inputAmount').value;
										input = forGod(input);
										document.getElementById('inputAmount').value=input;

									}
								</script>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Giá sản phẩm</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="inputAmount" placeholder="Nhập giá sản phẩm" name="giasanpham" style="width: 90%" value="<?php echo number_format($row['Gia_sanpham'],0,',','.') ?>" onkeyup="Chuyen()"> đ
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Mức khuyến mãi</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" id="inputPassword" name="khuyenmai" style="width: 30%" value="<?php echo $row['Kmai_sanpham'] ?>"> %
									</div>
								</div>

								<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Thể loại</label>
									<div class="col-sm-8"><select name="theloai" id="selector1" class="form-control1">
										<?php
											$loai=mysqli_query($conn,"select * from theloai");
											while($theloai=mysqli_fetch_array($loai)){
										 ?>
											 <?php if($theloai['ID_loai']==$row['ID_loai']){ ?>
											 <option selected="" value="<?php echo $theloai['ID_loai'] ?>"><?php echo $theloai['Ten_loai'] ?></option>
											 <?php }else{ ?>
											 <option value="<?php echo $theloai['ID_loai'] ?>"><?php echo $theloai['Ten_loai'] ?></option>
											 <?php } ?>
										 <?php } ?>
									</select></div>
								</div>
								
								<div class="form-group">
									<label for="txtarea1" class="col-sm-2 control-label">Mô tả</label>
									<div class="col-sm-8"><textarea name="mota" id="txtarea1" cols="50" rows="40" class="form-control1" placeholder="Nhập mô tả"><?php echo $row['Mota_sanpham'] ?></textarea></div>
									<script>  CKEDITOR.replace('txtarea1');</script>
								</div>

								<div class="panel-footer">
										<div class="row">
											<div class="col-sm-8 col-sm-offset-2">
												<button class="btn-success btn" name="edit">Sửa sản phẩm</button>
											</div>
										</div>
	 							</div>

							</form>
						</div>
					</div>
					
					<div class="bs-example" data-example-id="form-validation-states">
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
