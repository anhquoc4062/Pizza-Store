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
        	if(isset($_GET['id'])){
        		$id=$_GET['id'];
        		$qry=mysqli_query($conn,"select * from thanhvien,thanhpho where thanhvien.ID_thanhpho = thanhpho.ID_thanhpho and ID_thanhvien = '$id'");
        		$row=mysqli_fetch_array($qry);
        		$username=$row['Username'];
        		$hoten=$row['Hoten'];
        		$email=$row['Email'];
        		$password=$row['Password'];
        		$sodt=$row['Sodt'];
        		$thanhpho=$row['Ten_thanhpho'];
        		$diachi=$row['Diachi'];
        		$phanquyen=$row['ID_phanquyen'];
        	}

        	if(isset($_POST['edit'])){
        		$username=$_POST['username'];
        		$hoten=$_POST['hoten'];
        		$email=$_POST['email'];
        		$password=$_POST['password'];
        		$sodt=$_POST['sodt'];
        		$thanhpho=$_POST['thanhpho'];
        		$diachi=$_POST['diachi'];
        		$phanquyen=$_POST['phanquyen'];

        		mysqli_query($conn,"update thanhvien set Username='$username', Password='$password', Email='$email',Hoten='$hoten', ID_thanhpho='$thanhpho',Diachi='$diachi', Sodt='$sodt', ID_phanquyen='$phanquyen' where ID_thanhvien='$id'");

        		 echo '<script type="text/javascript">window.location.href="list-account.php"</script>';
        	}
         ?>
        <div id="page-wrapper">
        <div class="graphs">
	   <div class="widget_head">Sửa thông tin tài khoản</div>
	   			<a href="list-account.php" style="text-decoration: none"><div class="tinhtrang" style="background-color: #0069a8;width: 200px;height: 25px;line-height: 25px"><i class="fas fa-long-arrow-alt-left"></i> Trở về trang quản lý</div></a>

	            <div class="panel-body">
					<form action="" method="post" role="form" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-2 control-label">Tên tài khoản</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fas fa-user"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Nhập tên tài khoản..." value="<?php echo $username ?>" name="username">
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
									<input type="text" class="form-control1" placeholder="Nhập họ tên..." value="<?php echo $hoten ?>" name="hoten">
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
									<input type="text" class="form-control1" placeholder="Nhập email..." value="<?php echo $email ?>" name="email">
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
									<input type="text" class="form-control1" id="exampleInputPassword1" placeholder="Nhập mật khẩu..." value="<?php echo $password ?>" name="password">
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
									<input type="text" class="form-control1" placeholder="Nhập số điện thoại..." value="<?php echo $sodt ?>" name="sodt">
								</div>
							</div>
						</div>
						<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Thành phố</label>
									<div class="col-sm-8"><select name="thanhpho" id="selector1" class="form-control1" name="thanhpho">
										<?php
											$qry=mysqli_query($conn,"select * from thanhpho");
											while($tp=mysqli_fetch_array($qry)){
												if($tp['Ten_thanhpho']==$thanhpho){
										 ?>
										 <option selected="" value="<?php echo $tp['ID_thanhpho'] ?>"><?php echo $tp['Ten_thanhpho'] ?></option>
										 <?php }else{ ?>
										<option value="<?php echo $tp['ID_thanhpho'] ?>"><?php echo $tp['Ten_thanhpho'] ?></option>
										<?php }
											} ?>
									</select></div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Địa chỉ</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="far fa-address-book"></i>
									</span>
									<input type="text" class="form-control1" placeholder="Nhập địa chỉ..." value="<?php echo $diachi ?>" name="diachi">
								</div>
							</div>
						</div>
						<div class="form-group">
									<label for="selector1" class="col-sm-2 control-label">Phân quyền</label>
									<div class="col-sm-8"><select id="selector1" class="form-control1" name="phanquyen">
										<?php
											$qry_pq=mysqli_query($conn,"select * from phanquyen");
											while($pq=mysqli_fetch_array($qry_pq)){
												if($pq['ID_phanquyen']==$phanquyen){
										 ?>
										 <option selected="" value="<?php echo $pq['ID_phanquyen'] ?>"><?php echo $pq['Ten_phanquyen'] ?></option>
										 <?php }else{ ?>
										<option value="<?php echo $pq['ID_phanquyen'] ?>"><?php echo $pq['Ten_phanquyen'] ?></option>
										<?php }
											} ?>
									</select></div>
						</div>
						
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-8 col-sm-offset-2">
									<button class="btn-success btn" name="edit">Sửa</button>
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
