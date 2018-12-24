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
     <?php 
     $count=0;
      $id=$_GET['id'];
        if(isset($_POST['upload'])){
          foreach ($_FILES['file']['name'] as $i=>$name) {
            $name=$_FILES['file']['name'][$i];
            $type=$_FILES['file']['type'][$i];
            $size=$_FILES['file']['size'][$i];
            $tmp=$_FILES['file']['tmp_name'][$i];
            $path='uploads/'.basename($name);
            $tenhinhanh=basename($name);

            $explode=explode('.',$name);//tách chuỗi bằng dấu chấm
            $ext=end($explode);//lấy đuôi file ảnh
          if(empty($tmp)){
            echo "<script> alert('Hãy chọn ít nhất 1 ảnh!')</script>";
          }
          else{
            $allow=array('jpg','png');
            if(in_array($ext,  $allow)===false){
                echo "<script> alert('Đuôi file ảnh không hợp lệ, chỉ cho phép up ảnh đuôi .png hoặc .jpg')</script>";
            }
            else{
              if(move_uploaded_file($tmp,$path)){
                mysqli_query($conn,"insert into gallery (ID_sanpham,Hinh_sanpham) values ('$id','$tenhinhanh')");
                $count++;
              }else{
                echo "<script> alert('Lỗi không upload ảnh được')</script>";
              }
            }
          }
        }
        if($count>0){
          echo "<script> alert('Upload ".$count." ảnh thành công')</script>";
        }
      }
      $id_sanpham=$_GET['id'];
      if(isset($_GET['remove'])){
        $id_gallery=$_GET['remove'];
        mysqli_query($conn,"delete from gallery where ID_gallery='$id_gallery'");
         echo '<script type="text/javascript">window.location.href="gallery.php?id='.$id_sanpham.'"</script>';
      }
      ?>
    <div id="page-wrapper">
      <div class="col-md-12 graphs">
     <div class="xs">
      <?php 
        $qry_sanpham=mysqli_query($conn,"select * from sanpham where ID_sanpham='$id_sanpham'");
        $tensanpham=mysqli_fetch_array($qry_sanpham);

       ?>
     <h3>Thêm hình ảnh cho <?php echo $tensanpham['Ten_sanpham'] ?></h3>
     <a href="list-product.php?page=1" style="text-decoration: none"><div class="tinhtrang" style="background-color: #0069a8;width: 200px;height: 25px;line-height: 25px"><i class="fas fa-long-arrow-alt-left"></i> Trở về trang quản lý</div></a>

  <div class="bs-example4" data-example-id="simple-responsive-table">

    <form action="" method="post" enctype='multipart/form-data'>
      <div class="form-group">
                  <div class="col-sm-8">
                    <label>Thêm hình ảnh</label>
                    <input type="file" name="file[]" multiple="multiple" class="form-control1" id="focusedinput">
                  </div>
                 <!--  <div class="col-sm-2">
                   <p class="help-block">Chọn hình bạn thích</p>
                 </div> -->
                </div>
      <br>
<!--       <p style="font-size: 13px;color: red; font-style: italic;">Chỉ upload được tối đa 3 ảnh</p> -->
      <br>
      <input type="submit" name="upload" value="Upload" class="btn btn-danger upload"> 
    </form>  

    <div class="gallery" style="margin-top:30px;">
      <div class="container">
          <div class="row">
            <?php 
              $gallery=mysqli_query($conn,"select * from gallery where ID_sanpham='$id'");
              while($row=mysqli_fetch_array($gallery)){
             ?>
            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                  <div class="thumbnail" style="width: 100px">
                    <img src="uploads/<?php echo $row['Hinh_sanpham'] ?>" width="100px" height="100px">
                    <div class="action text-center">
                      <a href="gallery.php?id=<?php echo $id ?>&remove=<?php echo $row['ID_gallery'] ?>" onclick="return confirm('Bạn có muốn xóa ảnh này?')"><span class="remove">x</span></a>
                    </div>
                  </div>
            </div>
            <?php } ?>
          </div>
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
