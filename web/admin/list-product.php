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
        <?php   include('modules/header.php') ?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
     <div class="xs">
     <h3>Danh sách sản phẩm</h3>

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
      $qry_search=mysqli_query($conn,"select * from sanpham");
     ?>
     <div class="search-bar">
        <div id="myDropdown" class="dropdown-content">
          <form action="" method="post">
          <input type="text" placeholder="Tìm kiếm theo tên sản phẩm..." id="myInput" onkeyup="Hienbang()" name="tukhoa">
          <button class="search-button" name="search"><i class="fas fa-search"></i></button>
          </form>
          <div id="scroll">
            <?php while($timkiem=mysqli_fetch_array($qry_search)){ ?>
            <a href="edit-product.php?id=<?php echo $timkiem['ID_sanpham'] ?>"><?php echo $timkiem['Ten_sanpham'] ?></a>
            <?php } ?>
          </div>
        </div>
      </div>
  <div class="bs-example4" data-example-id="simple-responsive-table">

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="50px">STT</th>
            <th width="100px">Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th width="150px">Mức khuyến mãi</th>
            <th>Thể loại</th>
            <th colspan="2">Quản lý</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $check_search=0;
          if(isset($_POST['search'])){
            $tukhoa=$_POST['tukhoa'];
            $sql="select * from sanpham,theloai where sanpham.ID_loai=theloai.ID_loai and Ten_sanpham like '%$tukhoa%' order by ID_sanpham desc";
            $check_search=1;
          }
          else{
            $sql="select * from sanpham,theloai where sanpham.ID_loai=theloai.ID_loai order by ID_sanpham desc";
            $trang=$_GET['page'];
            $product=10*($trang-1);
            $sql.=" limit ".$product.", 10";
            $check_search=0;
          }
          $qry=mysqli_query($conn,$sql);
          $i=1;
          while($row=mysqli_fetch_array($qry)){

           ?>
          <tr>
            <td><?php echo $i ?></td>
            <td style="text-align: center"><img style="width:50px; height: 50px" src="uploads/<?php echo $row['Hinh_sanpham'] ?>">
              <?php 
                $qry_soanh=mysqli_query($conn,"select * from gallery where ID_sanpham=".$row['ID_sanpham']);
                $soanh=mysqli_num_rows($qry_soanh);
               ?>
                          <br><a href="gallery.php?id=<?php echo $row['ID_sanpham'] ?>" style="text-decoration: none;text-align: center"><div class="tinhtrang" style="background-color: #2ecc71"><?php echo $soanh ?> hình ảnh</div></a></td>
            <td><?php echo $row['Ten_sanpham'] ?></td>
            <td><?php echo number_format($row['Gia_sanpham'],0,',','.').' đ' ?></td>
            <td><?php echo $row['Kmai_sanpham'] ?></td>
            <td><?php echo $row['Ten_loai'] ?></td>
            <td><a href="edit-product.php?id=<?php echo $row['ID_sanpham'] ?>"><i class="fas fa-edit"></i> Sửa</a></td>
            <td><a href="modules/xuly.php?id=<?php echo $row['ID_sanpham'] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')"><i class="fas fa-eraser"></i> Xóa</a></td> <!-- Lấy id sản phẩm cần xóa -->
          </tr>

          <?php 
            $i++;
          }?>
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
    <?php if($check_search==0){ ?>
    <div class="product-pagination text-center">
                        <nav>
                          <?php 
                            $trang=$_GET['page'];
                           ?>
                          <ul class="pagination">
                            <li>
                              <a href="list-product.php?page=<?php echo $trang-1 ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?php 
                                $sql_product="select * from sanpham";

                                $qry=mysqli_query($conn,$sql_product);

                                $count=mysqli_num_rows($qry);
                               /* echo $count;*/
                                $page=ceil($count/10);
                                for($i=1;$i<=$page;$i++){
                                    if($i==$trang){
                                      echo '<li><a class="active" href="list-product.php?page='.$i.'">'.$i.'</a></li>';
                                    }
                                    else{
                                      echo '<li><a href="list-product.php?page='.$i.'">'.$i.'</a></li>';
                                    }
                                }
                             ?>

                            <li>
                              <a href="list-product.php?page=<?php echo $trang+1 ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                    <?php } ?>
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
