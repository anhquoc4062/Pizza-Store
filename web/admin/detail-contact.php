<!DOCTYPE HTML>
<html>
<head>
  <?php include('modules/head.php') ?>
</head>
<body>
  <?php include('modules/config.php') ?>
      <?php 
      $id_lienhe= $_GET['id'];
      mysqli_query($conn,"update lienhe set Daxem=1 where ID_lienhe='$id_lienhe'");
      $qry_lienhe=mysqli_query($conn,"select * from lienhe where ID_lienhe='$id_lienhe'");
      $row=mysqli_fetch_array($qry_lienhe);
     ?>
<div id="wrapper">
     <!-- Navigation -->
        <?php include('modules/header.php') ?>
             <?php session_start() ?>
     <?php include ('modules/quyentruycap.php') ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
     <div class="xs">
     <h3>Chi tiết liên hệ</h3>
     <a href="contact.php" style="text-decoration: none"><div class="tinhtrang" style="background-color: #0069a8;width: 200px;height: 25px;line-height: 25px"><i class="fas fa-long-arrow-alt-left"></i> Trở về trang quản lý</div></a>
  <div class="bs-example4" data-example-id="simple-responsive-table">

    <div class="guest-info">
      <table class="table-info">
        <tr>
          <th>Tên khách hàng: </th>
          <td style="text-align: left"><?php echo $row['Ten_lienhe'] ?></td>
        </tr>
        <tr>
          <th>Số điện thoại: </th>
          <td style="text-align: left"><?php echo $row['Sodt_lienhe'] ?></td>
        </tr>
        <tr>
          <th>Email: </th>
          <td style="text-align: left"><?php echo $row['Email_lienhe'] ?></td>
        </tr>
        <tr>
          <th>Ngày liên hệ: </th>
          <td style="text-align: left"><?php 
              $date=strtotime($row['Ngaylienhe']);
                      echo date('d/m/Y',$date); 
              ?>
              </td>
        </tr>
        <tr>
          <th>Tin nhắn: </th>
          <td width="300px"></td>
        </tr>

        <tr>
          <td colspan="2" style="padding-left: 25px;text-align: left"><?php echo $row['Tinnhan'] ?></td>
        </tr>
      </table>

    </div>
    <div class="phanhoi">
        <form action="modules/guiphanhoi.php?id=<?php echo $row['ID_lienhe'] ?>" method="post">
            <textarea id="phanhoi" placeholder="Gửi phản hồi..." style="width: 1112px; height: 146px;padding:10px" name="tinphanhoi"></textarea>
            <script>  CKEDITOR.replace('phanhoi');</script>
            <div class="panel-footer">
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <button class="btn-success btn" name="phanhoi">Gửi phản hồi</button>
                </div>
              </div>
             </div>
        </form>
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
