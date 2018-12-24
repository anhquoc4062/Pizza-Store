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
        <?php 

            if(isset($_GET['tinhtrang'])){
              if ($_GET['tinhtrang']=='0') {
                $id = $_GET['id'] ;
              mysqli_query($conn, "update donhang set Tinhtrang = '1' where ID_donhang = '$id'") ;
              header('location:list-order.php');
              }
              else{
                $id = $_GET['id'] ;
              mysqli_query($conn, "update donhang set Tinhtrang = '0' where ID_donhang = '$id'") ;
              header('location:list-order.php');
              }
              
            }
            if(isset($_GET['xoadonhang'])){
              $id = $_GET['id'] ;
              mysqli_query($conn , "delete from chitietdonhang where ID_donhang = '$id'");
              mysqli_query($conn , "delete from donhang where ID_donhang = '$id'");
              header('location:list-order.php');
            }

      ?>
              <?php include('modules/header.php') ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
     <div class="xs">
     <h3>Đơn hàng</h3>
  <div class="bs-example4" data-example-id="simple-responsive-table">
     <div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
        <div class="panel-body no-padding">
          <table class="table table-striped">
            <thead>
              <tr class="warning">
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Chi tiết</th>
                <th>Tình trạng</th>
                <th>Ngày đặt</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
             <?php 
              $qry=mysqli_query($conn,"select * from donhang order by ID_donhang desc");
              $i=1;
              while($row=mysqli_fetch_array($qry)){
               ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['Ten_khachhang'] ?></td>
                <td><?php echo $row['Sdt'] ?></td>
                <td><a href="detail-order.php?id=<?php echo $row['ID_donhang'] ?>">Xem chi tiết</a></td>
                <?php if($row['Tinhtrang']==0){ ?>
                <td><a href="list-order.php?id=<?php echo $row['ID_donhang'] ?>&tinhtrang=0" style="text-decoration: none"><div class="tinhtrang" style="background-color: #ed1a3b">Chưa xử lý</div></a></td>
                <?php }else{ ?>
                <td><a href="list-order.php?id=<?php echo $row['ID_donhang'] ?>&tinhtrang=1" style="text-decoration: none"><div class="tinhtrang" style="background-color: #2ecc71">Đã xử lý</div></a></td>
                <?php } ?>
                <?php $date=strtotime($row['Ngaydat']) ?>
                <td><?php echo date('d/m/Y',$date) ?></td>
                <td><a href="list-order.php?id=<?php echo $row['ID_donhang'] ?>&xoadonhang=1" onclick="return confirm('Bạn có muốn xóa đơn hàng này?')">Xóa</a></td>
              </tr>

              <?php 
                $i++;
              }?>
            </tbody>
          </table>
        </div>
  </div>
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
