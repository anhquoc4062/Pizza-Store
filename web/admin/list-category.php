<!DOCTYPE HTML>
<html lang="en">
<html>
<head>
  <meta charset="UTF-8">
  <?php include('modules/head.php') ?>
</head>
<body>
  <?php include('modules/config.php') ?>
       <?php session_start() ?>
     <?php include ('modules/quyentruycap.php') ?>
<div id="wrapper">
     <!-- Navigation -->
        <?php 
              if(isset($_POST['themtheloai'])){
                $tenloai=$_POST['tenloai'];
                mysqli_query($conn,"insert into theloai (Ten_loai) values ('$tenloai')");
                header('location:list-category.php');
              }
              if(isset($_GET['action'])&&$_GET['action']=='remove'){
                $id=$_GET['id'];
                mysqli_query($conn,"delete from sanpham where ID_loai=$id");
                mysqli_query($conn,"delete from theloai where ID_loai=$id");
                echo '<script type="text/javascript">window.location.href="list-category.php"</script>';
              }
/*              header('location:list-category.php');*/
        ?>
        <?php include('modules/header.php') ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
     <div class="xs">
     <h3>Thể loại sản phẩm</h3>
  <div class="bs-example4" data-example-id="simple-responsive-table">

    <div class="table-responsive">
      <table class="table table-bordered" style="width: 30%; margin: auto">
        <thead>
          <tr align="center">
            <th width="50px" style="text-align: center">STT</th>
            <th width="100px" style="text-align: center">Thể loại</th>
            <th></th>
          </tr>
        </thead>
        <tbody>  
          <?php 
            $qry_category=mysqli_query($conn,"select * from theloai");
            $i=1;
            while($row=mysqli_fetch_array($qry_category)){
           ?>    
          <tr>
            <td style="text-align: center"><?php echo $i ?></td>
            <td><?php echo $row['Ten_loai'] ?></td>
            <td><a href="list-category.php?action=remove&id=<?php echo $row['ID_loai'] ?>" onclick="return confirm('Bạn có muốn xóa loại sản phẩm này? Tất cả sản phẩm thuộc loại này sẽ bị xóa!')">Xóa</a></td>
          </tr>
          <?php 
              $i++;
            } 
          ?>
          <form action="" method="post">
            <tr>
              <td colspan="2" style="text-align: right"><input type="text" name="tenloai" placeholder="Nhập tên loại muốn thêm..."></td>
              <td style="text-align: center; width: 20%"><input type="submit" value="Thêm" name="themtheloai"></td>
            </tr>
          </form>
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
