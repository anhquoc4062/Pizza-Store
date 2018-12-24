<!DOCTYPE HTML>
<html>
<head>
<?php include('modules/head.php') ?>
</head>
<body>
	<?php include('modules/config.php') ?>
	     <?php session_start() ?>
     <?php include ('modules/quyentruycap.php') ?>
<div id="wrapper">
     <!-- Navigation -->
        <?php include('modules/header.php') ?>
        <div id="page-wrapper">
        <div class="graphs">
     	<div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-shopping-cart icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $chuaxuli ?></strong></h5>
                      <span>Đơn hàng mới</span>
                    </div>
                </div>
        	</div>
        	<?php 
        		$today = date("Y-m-d");
        		$qry_thanhvienmoi = mysqli_query($conn,"select * from thanhvien where Ngaytao = '$today'");
        		$thanhvienmoi= mysqli_num_rows($qry_thanhvienmoi);
        	 ?>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-users user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $thanhvienmoi ?></strong></h5>
                      <span>Thành viên mới</span>
                    </div>
                </div>
        	</div>
          <?php 
            $qry_lienhe = mysqli_query($conn,"select * from lienhe where Daxem=0");
            $lienhemoi= mysqli_num_rows($qry_lienhe);
           ?>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $lienhemoi ?></strong></h5>
                      <span>Liên hệ mới</span>
                    </div>
                </div>
        	</div>
        	<?php 
        		$profit=0;
        		$qry_doanhthu=mysqli_query($conn,"select * from donhang, chitietdonhang, sanpham where chitietdonhang.ID_sanpham= sanpham.ID_sanpham and donhang.ID_donhang = chitietdonhang.ID_donhang and Ngaydat = '$today'");

        		while($tongtien=mysqli_fetch_array($qry_doanhthu)){
        			$giasanpham = $tongtien['Gia_sanpham'] - ($tongtien['Kmai_sanpham']*$tongtien['Gia_sanpham'])/100;
        			$profit+=($giasanpham*$tongtien['Soluong']);
        		}

        	 ?>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo number_format($profit ,0,',','.').' đ' ?></strong></h5>
                      <span>Doanh thu hôm nay</span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
      <div class="col_1">
      	<?php 
      		/*$today=date("Y-m-d");*/
      		$qry=mysqli_query($conn,"SELECT * FROM sanpham,thanhvien,danhgia where sanpham.ID_sanpham = danhgia.ID_sanpham and thanhvien.ID_thanhvien = danhgia.ID_thanhvien order by Ngaydang desc limit 0,4");
      	 ?>
      		<div class="col-md-8 span_8 text-left">
				<h3 align="left">Đánh giá sản phẩm mới nhất</h3>
		       <div class="activity_box">
		        <div class="scrollbar" id="style-2">
		        	<?php while($row=mysqli_fetch_array($qry)){ ?>
                   <div class="activity-row">
                   	<?php if($row['Sosao']==1||$row['Sosao']==2){ ?>
	                 <div class="col-xs-1"><i class="fas fa-frown text-info icon_13" style="color: #ef553a"> </i></div>
	                 <?php }else if($row['Sosao']==3){ ?>
	                 <div class="col-xs-1"><i class="fas fa-meh text-info icon_13" style="color: #9358ac"> </i></div>
	                 <?php }else{ ?>
	                 <div class="col-xs-1"><i class="fas fa-smile text-info icon_13" style="color: #00aced"> </i></div>
	                 <?php } ?>
	                 <div class="col-xs-8 activity-desc text-left">
	                 	<h5><a href="#" style="color: #0069a8"><?php echo $row['Username'] ?></a> đã đánh giá 
	                 		<span style="color: #f39c12">
	                 			<?php for($i=1;$i<=$row['Sosao'];$i++){ ?>
                                <i class="fa fa-star"></i>
                                <?php } ?>
                                <?php for($i=($row['Sosao']+1);$i<=5;$i++){ ?>
                                <i class="far fa-star"></i>
                                <?php } ?>
	                 		</span>
	                 	 cho <a href="../single-product.php?id=<?php echo $row['ID_sanpham'] ?>" style="color:#ed1a3b"><?php echo $row['Ten_sanpham'] ?></a></h5>
	                    <p><?php echo $row['Nhanxet'] ?></p>
	                    <h6><?php 
	                    $ngaydang=strtotime($row['Ngaydang']);
	                    echo date("d/m/Y",$ngaydang);

	                    ?></h6>
	                 </div>
	                 <div class="clearfix"> </div>
                    </div>
                    <?php } ?>
	  		        </div>
		          </div>
		    </div>
		    <div class="col-md-4 span_7">	
		    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
			<script src="js/underscore-min.js" type="text/javascript"></script>
			<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
			<script src="js/clndr.js" type="text/javascript"></script>
			<script src="js/site.js" type="text/javascript"></script>
		    	<h3 style="opacity: 0">a</h3>
		      <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
		    </div>
<!-- //map -->
       </div>
   
		<div class="clearfix"> </div>
	    </div>
		<div class="copy">
            <p>Copyright &copy; 2015 Modern. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	    </div>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
