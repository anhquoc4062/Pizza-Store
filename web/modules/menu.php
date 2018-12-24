<?php 
    if(isset($_GET['thaotac'])&&$_GET['thaotac']=='logout'){
        unset($_SESSION['thanhvien']);
        unset($_SESSION['id_thanhvien']);
    }
    $qry_order=mysqli_query($conn,"select * from donhang where Tinhtrang = 0");
    $chuaxuli=mysqli_num_rows($qry_order);

 ?>

 <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <?php if(isset($_SESSION['thanhvien'])) { ?>
                                <li><a href="profile.php"><i class="fa fa-user"></i> Tài khoản</a></li>
                            <?php } ?>
                                <!-- <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li> -->
                                <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <li><a href="checkout.php"><i class="far fa-credit-card"></i> Thanh toán</a></li>
                                <?php if(!isset($_SESSION['thanhvien'])) {
                                            echo '<li><a href="login.php" class="login-btn"><i class="fa fa-user"></i> Đăng nhập</a></li>';
                                } ?>
                                <?php if(isset($_SESSION['id_thanhvien'])) {
                                        $id_thanhvien=$_SESSION['id_thanhvien'];
                                            $qry_quyen=mysqli_query($conn,"select * from thanhvien where ID_thanhvien = '$id_thanhvien'");
                                            $quyenhanh=mysqli_fetch_array($qry_quyen);
                                            if($quyenhanh['ID_phanquyen']==1){
                                    ?>
                                    <li><a href="admin/index.php" class="login-btn"><i class="fas fa-user-tie"></i> Quản trị</a>
                                        <?php if($chuaxuli>0){ ?>
                                        <span class="alert" style="background-color:red">a</span>
                                        <?php } 
                                            }?>
                                    </li>
                                <?php  }?>

                        </ul>
                        <?php 
                            if(isset($_SESSION['thanhvien'])){
                                $thanhvien=$_SESSION['thanhvien'];
                         ?>
                        <p>Xin chào, <?php echo $thanhvien ?>   <a href="index.php?thaotac=logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></p>
                        <?php } ?>

                    </div>
                </div>

            </div>
        </div>
    </div> <!-- End header area -->
    
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png"></a>
                </div>
            </div>
            
            <div class="col-sm-6">
                <div class="shopping-item" style="cursor: pointer">
                    <a class="gio_hang">Giỏ hàng - 
                    <span class="cart-amunt" id="total-amount"><?php 
                        if(isset($thanhtien)){
                            echo number_format($thanhtien,0,',','.').' đ';
                        }
                        else{
                            echo 1;
                        }
                    ?>
                        
                    </span><i class="fa fa-shopping-cart"></i> <span id="count" class="product-count"><?php 
                        if(isset($count)){
                            echo $count;
                        }
                        else{
                            echo 0;
                        }

                    ?></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

   <div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="shop.php?theloai=0&page=1" class="category-hover">Thực đơn</a>
                        <ul class="category-doc">
                            <?php 
                                $qry=mysqli_query($conn,"select * from theloai");
                                while($row=mysqli_fetch_array($qry)){
                             ?>
                            <li><a href="shop.php?theloai=<?php echo $row['ID_loai'] ?>&page=1"><?php echo $row['Ten_loai'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="single-product.php?id=45">Khẩu phần</a></li>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                    <li><a href="checkout.php">Thanh toán</a></li>
                    <!-- <li><a href="#">Category</a></li>
                    <li><a href="#">Others</a></li> -->
                    <li><a href="contact.php">Liên hệ</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div> 