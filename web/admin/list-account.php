<!DOCTYPE HTML>
<html>
<head>
  <?php include('modules/head.php') ?>
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
</head>
<body>
  <?php include('modules/config.php') ?>
<div id="wrapper">
     <!-- Navigation -->
        <?php include('modules/config.php') ?>
             <?php session_start() ?>
     <?php include ('modules/quyentruycap.php') ?>
        <?php   include('modules/header.php') ?>
        <?php 
            if(isset($_GET['action'])&&$_GET['action']=='remove'){
              $id=$_GET['id'];

              mysqli_query($conn,"delete from thanhvien where ID_thanhvien='$id'");
              echo '<script type="text/javascript">window.location.href="list-account.php"</script>';
            }
         ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
     <div class="xs">
     <h3>Danh sách tài khoản</h3>

            <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */

         jQuery(document).ready(function($) {
                                    $('html, body').click(function(event) {
                                        /* Act on the event */
                                        if(event.target.id=="scroll"||event.target.id=="myInput"){
                                            return;
                                        }
                                        var bang=document.getElementById('scroll');
                                        bang.style.display="none";
                                    });
                                });


        function Hienbang() {
            document.getElementById("scroll").style.display="block";
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
    <?php 
      $qry_search=mysqli_query($conn,"select * from thanhvien where ID_thanhvien not like '1'");
     ?>
     <div class="search-bar">
        <div id="myDropdown" class="dropdown-content">
          <input type="text" placeholder="Tìm kiếm theo tên tài khoản..." id="myInput" onkeyup="Hienbang()">
          <button type="submit" class="search-button" name="search"><i class="fas fa-search"></i></button>
          <div id="scroll">
            <?php while($timkiem=mysqli_fetch_array($qry_search)){ ?>
            <a href="edit-account.php?id=<?php echo $timkiem['ID_thanhvien'] ?>"><?php echo $timkiem['Username'] ?></a>
            <?php } ?>
          </div>
        </div>
      </div>

  <div class="bs-example4" data-example-id="simple-responsive-table">

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>STT</th>
            <th>Tên tài khoản</th>
            <th>Họ và tên</th>
            <th>Email</th>
            <th>Quyền hành</th>
            <th>Ngày tạo</th>
            <th colspan="2">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $sql="select * from thanhvien,thanhpho,phanquyen where thanhvien.ID_phanquyen = phanquyen.ID_phanquyen and thanhvien.ID_thanhpho = thanhpho.ID_thanhpho order by ID_thanhvien desc";
          $qry=mysqli_query($conn,$sql);
          $i=1;
          while($row=mysqli_fetch_array($qry)){

           ?>
          <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['Username'] ?></td>
            <td><?php echo $row['Hoten'] ?></td>
            <td><?php echo $row['Email'] ?></td>
            <td><?php echo $row['Ten_phanquyen'] ?></td>
            <td><?php 
                  $date=strtotime($row['Ngaytao']);
                  echo date("d/m/Y",$date); 
                ?>
            </td>
            <td><a href="edit-account.php?id=<?php echo $row['ID_thanhvien'] ?>"><i class="fas fa-edit"></i></a></td>
            <td><a href="list-account.php?action=remove&id=<?php echo $row['ID_thanhvien'] ?>" onclick="return confirm('Bạn có muốn xóa tài khoản này?')"><i class="fas fa-eraser"></i></a></td>
          </tr>

          <?php 
            $i++;
          }?>
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
