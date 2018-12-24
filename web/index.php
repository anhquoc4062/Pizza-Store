
    <?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <?php include('modules/head.php') ?>

  </head>
  <body>
    <!-- End header area -->
    
    <?php include('modules/config.php') ?>

    <?php include('modules/cart-hidden.php') ?>

    <?php include('modules/menu.php') ?>

    <?php 
                    $sql="select * from sanpham,theloai where theloai.ID_loai=sanpham.ID_loai and theloai.Ten_loai like 'Pizza' limit 0,8";
                    $qry=mysqli_query($conn,$sql);
                ?>
    
    <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-id" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-id" data-slide-to="1" class=""></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="images/pizza-slide-01.png">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Mozzarella</h1>
                        <h3><div class="chunho">Giá chỉ còn</div><span style="color: #ed1a3b; font-size:60px">220.000 đ</span></h3>
                        <h2>Giảm 20%</h2>
                        <p><button id="5" data-name="Mozzarella" data-price="220000" class="add-to-cart btn btn-lg btn-primary">Đặt hàng</button></p>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="images/pizza-slide-02.png">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Italian Sausage</h1>
                        <h3><div class="chunho">Giá chỉ còn</div><span style="color: #ed1a3b; font-size:60px">230.000 đ</span></h3>
                        <h2>Giảm 30%</h2>
                        <p><button class="add-to-cart btn btn-lg btn-primary" id="4" data-name="Italian Sausage" data-price="230000" role="button">Đặt hàng</button></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- end carousel -->
    
    <div class="top3">
        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center nendo">
                            <div class="icon">
                                <img src="images/icon_4.png">
                            </div>
                            <h3>Giao hàng nhanh</h3>
                            <p>Cam kết giao hàng đúng hẹn, nếu trễ thì thôi</p>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center nenxanh">
                            <div class="icon">
                                <img src="images/icon_6.png">
                            </div>
                            <h3>An toàn thực phẩm</h3>
                            <p>Thức ăn hợp vệ sinh, đảm báo an toàn thực phẩm</p>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center nendo">
                            <div class="icon">
                                <img src="images/icon_5.png">
                            </div>
                            <h3>Nguyên liệu tự nhiên</h3>
                            <p>Nguyên liệu được chọn lọc từ những nông trại đạt chuẩn quốc tế</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <div class="maincontent-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product text-center">
                        <h2 class="section-title"><span style="color: #ed1a3b">Mới ra</span> lò</h2>
                        <div class="product-carousel">
                            <?php 
                                $qry_new=mysqli_query($conn,"select * from sanpham,theloai where theloai.ID_loai=sanpham.ID_loai and theloai.Ten_loai like 'Pizza' limit 0,6");
                                while($row_new=mysqli_fetch_array($qry_new)){ 
                                ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <a href="single-product.php?id=<?php echo $row_new['ID_sanpham'] ?>"><img src="admin/uploads/<?php echo $row_new['Hinh_sanpham'] ?>" alt=""></a>
                                </div>
                                
                                <h2><a href="single-product.php?id=<?php echo $row_new['ID_sanpham'] ?>"><?php echo $row_new['Ten_sanpham'] ?></a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins><?php 
                                        $giakhuyenmai=$row_new['Gia_sanpham']-($row_new['Gia_sanpham']*$row_new['Kmai_sanpham'])/100;
                                        echo number_format($giakhuyenmai,0,',','.').' đ';  
                                         ?>
                                    </ins>
                                </div> 
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
        </div>
    </div><!-- End main content area -->
    
    <div class="brands-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Các <span style="color: #ed1a3b">thương hiệu</span></h2>
                        <div class="brand-list">
                            <img src="images/brand1.png" alt="">
                            <img src="images/brand2.png" alt="">
                            <img src="images/brand3.png" alt="">
                            <img src="images/brand4.png" alt="">
                            <img src="images/brand1.png" alt="">
                            <img src="images/brand2.png" alt="">
                            <img src="images/brand3.png" alt="">
                            <img src="images/brand4.png" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->

    <div class="menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1><span style="color: #ed1a3b">THỰC</span> ĐƠN</h1>
                    <p>HÃY NHANH CHÓNG ĐẶT HÀNG ĐỂ THƯỞNG THỨC!</p>
                </div>
            </div>
            <div class="row">
                <?php
                    while($row=mysqli_fetch_array($qry)){
                 ?>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <a href="single-product.php?id=<?php echo $row['ID_sanpham'] ?>">
                            <?php if($row['Kmai_sanpham']!=0){ ?>
                                <div class="kmai">-<?php echo $row['Kmai_sanpham'] ?>%</div>
                            <?php }?>
                            <img src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>" alt="">
                            <div class="caption">
                            <div class="danhgia">
                                <?php for($i=1;$i<=$row['Sao_sanpham'];$i++){ ?>
                                        <i class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php for($i=($row['Sao_sanpham']+1);$i<=5;$i++){ ?>
                                        <i class="far fa-star"></i>
                                        <?php } ?>
                            </div>
                            <h3><?php echo $row['Ten_sanpham'] ?></h3>
                            <p>
                                    <?php if($row['Kmai_sanpham']!=0){ ?>
                                    <del><?php echo number_format($row['Gia_sanpham'],0,',','.').' đ'?></del>
                                    <br> 
                                    <ins>
                                    <?php
                                       $giakhuyenmai=$row['Gia_sanpham']-($row['Gia_sanpham']*$row['Kmai_sanpham'])/100;

                                        echo number_format($giakhuyenmai,0,',','.').' đ'   
                                    ?>  
                                    </ins>
                                    <?php }else{ ?>
                                    <del id="giagoc"><?php echo number_format($row['Gia_sanpham'],0,',','.').' đ'?></del>
                                    <br>
                                    <ins id="giavohinh">...</ins>
                                    <?php } ?>
                                </p>
                        </div>
                    </a>    
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="row text-center">
                <div class="viewall"><a href="shop.php?theloai=all&page=1" class="btn btn-default">Xem tất cả</a></div>
            </div>
        </div>
    </div>

    <!-- Contact -->
    
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