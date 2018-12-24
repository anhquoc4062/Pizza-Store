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
        	if(isset($_POST['add'])){
        		$username=$_POST['username'];
        		$hoten=$_POST['hoten'];
        		$email=$_POST['email'];
        		$password=$_POST['password'];
        		$sodt=$_POST['sodt'];
        		$thanhpho=$_POST['thanhpho'];
        		$diachi=$_POST['diachi'];
        		$phanquyen=$_POST['phanquyen'];
        		$ngaythem=date("Y-m-d");

        		mysqli_query($conn,"insert into thanhvien (Username,Hoten,Password,Email,Sodt,ID_thanhpho,Diachi,ID_phanquyen,Ngaytao) values ('$username','$hoten','$email','$password','$sodt','$thanhpho','$diachi','$phanquyen','$ngaythem')");

        		echo '<script type="text/javascript">window.location.href="list-account.php"</script>';
        	}
         ?>
        <div id="page-wrapper">
        <div class="graphs">
	   <div class="widget_head">Thêm tài khoản</div>

	            <div class="panel-body">
					<form action="" method="post" role="form" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label">Tên tài khoản</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fas fa-user"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Nhập tên tài khoản..." name="username">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Họ và tên</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="far fa-user-circle"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Nhập họ tên..." name="hoten">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Email</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="far fa-envelope"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Nhập email..." name="email">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Mật khẩu</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" class="form-control1" id="exampleInputPassword1" placeholder="Nhập mật khẩu..." name="password">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Số điện thoại</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fas fa-phone"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Nhập email..." name="sodt">
								</div>
							</div>
						</div>
						<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Thành phố</label>
									<div class="col-sm-8"><select name="thanhpho" id="selector1" class="form-control1">
										<?php
											$tp=mysqli_query($conn,"select * from thanhpho");
											while($row=mysqli_fetch_array($tp)){
										 ?>
										<option value="<?php echo $row['ID_thanhpho'] ?>"><?php echo $row['Ten_thanhpho'] ?></option>
										<?php } ?>
									</select></div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Địa chỉ</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="far fa-address-book"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Nhập địa chỉ..." name="diachi">
								</div>
							</div>
						</div>
						<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Phân quyền</label>
									<div class="col-sm-8"><select name="phanquyen" id="selector1" class="form-control1">
										<?php
											$qry_pq=mysqli_query($conn,"select * from phanquyen");
											while($pq=mysqli_fetch_array($qry_pq)){
										 ?>
										<option value="<?php echo $pq['ID_phanquyen'] ?>"><?php echo $pq['Ten_phanquyen'] ?></option>
										<?php } ?>
									</select></div>
						</div>
						
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn" name="add">Thêm</button>
								</div>
							</div>
						 </div>
						
					</form>
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
