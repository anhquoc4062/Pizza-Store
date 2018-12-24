<!DOCTYPE html>
<html lang="en">
  <head>
    
   <?php include('modules/head.php') ?>

  </head>
  <body>

    <?php session_start() ?>

    <?php include('modules/config.php') ?>
    <?php 
    //Thêm sản phẩm vào giỏ hàng
        if(isset($_GET['action'])&&$_GET['action']=='add'){
            $id=$_GET['id'];
            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['quantity']++;
            }
            else{
                $sql_cart="select * from sanpham where ID_sanpham=".$id;
                $qry=mysqli_query($conn,$sql_cart);
                $row_s=mysqli_fetch_array($qry);
    
                $_SESSION['cart'][$row_s['ID_sanpham']]=array(
                    "quantity"=>1,
                );
            }
            $theloai=$_GET['theloai'];
            $page=$_GET['page'];
            header('location:shop.php?theloai='.$theloai.'&page='.$page);
        }
    ?>

    <?php include('modules/cart-hidden.php') ?>
   
    <?php include('modules/menu.php') ?>
    
  <?php include('modules/product-page.php') ?>

  <?php include('modules/footer.php') ?>


    <div id="back-to-top" class="back-to-top" data-toggle="tooltip" data-placement="left" title="Trở lên đầu trang"><span class="glyphicon glyphicon-chevron-up text-primary"></span></div>

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>