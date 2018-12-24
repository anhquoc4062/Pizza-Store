<!DOCTYPE HTML>
<html>
<head>
  <?php include('modules/head.php') ?>
</head>
<body>
  <?php include('modules/config.php') ?>
<div id="wrapper">
     <!-- Navigation -->
        <?php include('modules/header.php') ?>
             <?php session_start() ?>
     <?php include ('modules/quyentruycap.php') ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
     <div class="xs">
     <h3>Chi tiết đơn hàng</h3>

  <div class="bs-example4" data-example-id="simple-responsive-table">
    <?php 
      $id_donhang=$_GET['id'];
      $qry=mysqli_query($conn,"select * from donhang where ID_donhang = '$id_donhang'");
      $row=mysqli_fetch_array($qry);
     ?>

    <div class="guest-info">
      <table class="table-info">
        <tr>
          <th>Tên khách hàng: </th>
          <td><?php echo $row['Ten_khachhang'] ?></td>
        </tr>
        <tr>
          <th>Số điện thoại: </th>
          <td><?php echo $row['Sdt'] ?></td>
        </tr>
        <tr>
          <th>Email: </th>
          <td><?php echo $row['Email'] ?></td>
        </tr>
        <tr>
          <th>Địa chỉ: </th>
          <td><?php echo $row['Diachi'] ?></td>
        </tr>
        <tr>
          <th>Tỉnh/ thành: </th>
          <td><?php echo $row['Thanhpho'] ?></td>
        </tr>
        <tr>
          <th>Ghi chú: </th>
          <td><?php echo $row['Ghichu'] ?></td>
        </tr>
      </table>

    </div>

    <div class="table-responsive">
      <h4>Chi tiết giỏ hàng</h4>
      <table class="table table-bordered" style="color: black">
        <thead>
          <tr>
            <th>STT</th>
            <th>Hình ảnh</th>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng cộng</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $id_donhang=$_GET['id'];
          $sql="select sanpham.Hinh_sanpham, sanpham.Ten_sanpham, sanpham.Gia_sanpham, sanpham.Kmai_sanpham, chitietdonhang.Soluong from chitietdonhang,sanpham where sanpham.ID_sanpham =chitietdonhang.ID_sanpham and ID_donhang = '$id_donhang'";
          $qry=mysqli_query($conn,$sql);
          $i=1;
          $thanhtien=0;
          while($row=mysqli_fetch_array($qry)){
            $giasanpham = $row['Gia_sanpham']-($row['Gia_sanpham']*$row['Kmai_sanpham'])/100;

           ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><img style="width:50px; height: 50px" src="uploads/<?php echo $row['Hinh_sanpham'] ?>"></td>
            <td><?php echo $row['Ten_sanpham'] ?></td>
            <td><?php echo number_format($giasanpham,0,',','.').' đ' ?></td>
            <td><?php echo $row['Soluong'] ?></td>
            <td><?php echo number_format($giasanpham*$row['Soluong'] ,0,',','.').' đ' ?></td>
          </tr>

          <?php 
            $thanhtien+=$giasanpham*$row['Soluong'];
            $i++;
          }?>
          <tr>
            <th colspan="5" style="text-align: center">Thành tiền</th>
            <td><?php echo number_format($thanhtien,0,',','.').' đ' ?></td>
          </tr>
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
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
