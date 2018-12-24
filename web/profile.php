
<!DOCTYPE html>
<html>
<head>
<title>Thông tin cá nhân</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tabbed Profile Widget Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/profile.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/rating.css">
</head>
<body>
	<?php 
		include('modules/config.php');
		session_start();
	 ?>
	 <?php 
	 	 if(isset($_SESSION['id_thanhvien'])){
	 		$id_thanhvien=$_SESSION['id_thanhvien'];

	 	if(isset($_POST['capnhatthongtin'])){
	 		$hoten=$_POST['hoten'];
	
	 		$email=$_POST['email'];
	
	 		$sodt=$_POST['sodt'];

	 		$diachi=$_POST['diachi'];
	 
	 		$thanhpho=$_POST['thanhpho'];


	 		mysqli_query($conn,"update thanhvien set Hoten='$hoten',Email='$email',Sodt='$sodt',Diachi='$diachi',ID_thanhpho='$thanhpho' where ID_thanhvien='$id_thanhvien'");
	 		echo "<script type='text/javascript'>alert('Cập nhật thông tin thành công')</script>";
	 	}

	 		 		$qry=mysqli_query($conn,"select * from thanhvien,thanhpho where thanhvien.ID_thanhpho=thanhpho.ID_thanhpho and ID_thanhvien = '$id_thanhvien'");

	 		$row=mysqli_fetch_array($qry);
	 	$checkmkcu=0;
	 	$checkkhop=0;
	 	if(isset($_POST['capnhatmatkhau'])){
	 		$mkcu=$_POST['mkcu'];
	 		$mkmoi=$_POST['mkmoi'];
	 		$remkmoi=$_POST['remkmoi'];
	 		if($row['Password']!=$mkcu){
	 			$checkmkcu=1;
	 		}
	 		else{
	 			if($mkmoi!=$remkmoi){
	 				$checkkhop=1;
	 			}
	 		}
	 		if($checkmkcu==0&&$checkkhop==0){
	 			mysqli_query($conn,"update thanhvien set Password='$mkmoi' where ID_thanhvien='$id_thanhvien'");
	 			echo "<script type='text/javascript'>alert('Cập nhật mật khẩu thành công')</script>";
      		}
	 	}
	 }
	 
	 else{
	 	 echo '<script type="text/javascript">window.location.href="login.php"</script>';
	 }

	  ?>
	<div class="main">
		<h1>Trang thông tin cá nhân</h1>
		<div class="content">
			<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
					<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
						<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true,   // 100% fit in a container
									closed: 'accordion', // Start closed if in accordion view
									activate: function(event) { // Callback function if tab is switched
										var $tab = $(this);
										var $info = $('#tabInfo');
										var $name = $('span', $info);
										$name.text($tab.text());
										$info.show();
									}
								});

								$('#verticalTab').easyResponsiveTabs({
									type: 'vertical',
									width: 'auto',
									fit: true
								});
							});
						</script>
						<div class="portfolio-grid">
							<div class="port-left">
								<ul class="resp-tabs-list">
									  <img class="lady" src="images/pic1.png" alt="" />
									  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Thông tin</span></li>
									  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Đổi mật khẩu</span></li>
									  <a href="index.php"><li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>Trở về</span></li></a>
									  <div class="clear"></div>
								</ul>		
							</div>
							<div class="port-right">
								
									<div class="resp-tabs-container">
										<form action="" method="post">
										<div class="tab-0 resp-tab-content" aria-labelledby="tab_item-0">
											<div class="profile-content">
												<h3>Họ và tên</h3>	
												<div class="input-group">
													<span class="input-group-btn">
													</span>				
																<input type="text" name="hoten" class="form-control" placeholder="Nhập họ tên..." value="<?php echo $row['Hoten'] ?>" >	
												</div>
												<h3>Email</h3>
												<div class="email-group">
														<div class="email-form">
																<input type="text" class="fb-ico" name="email" placeholder="Nhập email..." value="<?php echo $row['Email'] ?>" >	
														</div>
														<div class="clear"></div>
												</div>
												<h3>Số điện thoại</h3>	
												<div class="phone-group">			
														<div class="cell-form">
																<input type="text" placeholder="Nhập số điện thoại..." value="<?php echo $row['Sodt'] ?>"  name="sodt">	
														</div>
														<div class="clear"></div>					 
												</div>
												<h3>Địa chỉ</h3>	
												<div class="phone-group">			
													<!-- <div class="cell-icon"><span></span></div> -->
														<div class="cell-form">
																<input type="text" name="diachi" placeholder="Nhập địa chỉ..." value="<?php echo $row['Diachi'] ?>" >	
														</div>
														<div class="clear"></div>					 
												</div>
												<h3>Thành phố</h3>	
												<div class="phone-group">			
													<!-- <div class="cell-icon"><span></span></div> -->
														<div class="cell-form">

																<select class="btn btn-default button-one" style="width: 100%" name="thanhpho">
																	<?php 
																		$qry_thanhpho=mysqli_query($conn,"select * from thanhpho");
																		while($thanhpho=mysqli_fetch_array($qry_thanhpho)){
																			if($row['ID_thanhpho']==$thanhpho['ID_thanhpho']){
																	 ?>
																	 <option value="<?php echo $thanhpho['ID_thanhpho'] ?>" selected=""><?php echo $thanhpho['Ten_thanhpho'] ?></option>
																	 <?php }else{ ?>
																	<option value="<?php echo $thanhpho['ID_thanhpho'] ?>"><?php echo $thanhpho['Ten_thanhpho'] ?></option>
																	<?php }
																	} ?>
																</select>
														</div>
														<div class="clear"></div>					 
												</div>
												
											</div>
											<div class="update">
												<input type="submit" name="capnhatthongtin" value="Cập nhật" style="cursor: pointer;">
											</div>
											<div class="clear"></div>
										</div>
										</form>
										<form action="" method="post">
										<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-4">
											<div class="work-play">
												<h3>Đổi mật khẩu</h3>

												<h4>Mật khẩu cũ</h4>
											
													<input type="password" value="" placeholder="Nhập mật khẩu cũ..." name="mkcu">
													<?php if($checkmkcu==1){ ?>
													<p style="color: red; text-align: center; font-size: 12px">Sai mật khẩu</p>	
													<?php } ?>
												
												<h4>Mật khẩu mới</h4>
											
													<input type="password" value="" placeholder="Nhập mật khẩu mới..." name="mkmoi">	
												
												<h4>Nhập lại mật khẩu</h4>
											
													<input type="password" value="" placeholder="Nhập lại mật khẩu mới..." name="remkmoi">
													<?php if($checkkhop==1){ ?>
													<p style="color: red;text-align: center; font-size: 12px">Mật khẩu không khớp</p>
													<?php } ?>		
												
											</div>	
											<div class="update">
												<input type="submit" name="capnhatmatkhau" value="Cập nhật" style="cursor: pointer;"></a>
											</div>
											<div class="clear"></div>
										</div>									
									</div>	
									</form>
										
								
							</div>	
							<div class="clear"></div>
						</div>
						
			</div>
		</div>
		<div class="clear"></div>
		<p class="footer">Copyright © 2016 Tabbed Profile Widget. All Rights Reserved | Template by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	</div>
</body>
</html>