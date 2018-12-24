<!DOCTYPE html>
<html lang="en">
  <head>

   <?php include('modules/head.php') ?>

   <link rel="stylesheet" type="text/css" href="css/rating.css">

   <script type="text/javascript" src="js/rating.js"></script>
   
  </head>
  <body>

        <?php include('modules/config.php') ?>

    <?php session_start() ?>

    <?php include('modules/cart-hidden.php') ?>

    <?php include('modules/menu.php') ?>
    
    <div class="single-product-area">
        
    <div class="khauphan">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>KHẨU <span style="color: #ed1a3b">PHẦN</span></h1>
                </div>
            </div>
            <script type="text/javascript">
                function Loc(){
                    var input = document.getElementById('search-bar');
                    var filter = input.value.toUpperCase();
                    console.log(filter);
                    var sidebar= document.getElementById('isidebar-scroll');
                    var thumbnail=sidebar.getElementsByTagName('div');
                    for(var i =0; i<thumbnail.length;i++){
                        var a = thumbnail[i].getElementsByTagName('a')[0];
                        var p =a.getElementsByTagName('p')[0];
                        console.log(p.innerHTML.toUpperCase());
                        if(p.innerHTML.toUpperCase().indexOf(filter)>-1){
                            thumbnail[i].style.display="";
                            count++;
                        }
                        else{
                             thumbnail[i].style.display="none";
                        }
                    }

                }
            </script>
            <div class="row">
                 <div class="col-md-3">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">TÌM KIẾM</h2>
                        <form action="">
                            <input id="search-bar" type="text" placeholder="Tìm kiếm sản phẩm..." onkeyup="Loc()">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm</h2>
                        <div class="sidebar-parent">
                            <div class="sidebar-scroll" id="isidebar-scroll">
                                <?php 
                                    $sql_single="select * from sanpham";
                                    $qry = mysqli_query($conn,$sql_single);
                                    while ($row=mysqli_fetch_array($qry)) {
                                 ?>
                                <div class="thubmnail-recent">
                                    <img src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>" class="recent-thumb" alt="">
                                    <a href="single-product.php?id=<?php echo $row['ID_sanpham'] ?>"><p><?php echo $row['Ten_sanpham'] ?></p></a>
                                        <?php 
                                            $giagoc=$row['Gia_sanpham'];
                                            $giakmai=$giagoc-(($giagoc*$row['Kmai_sanpham'])/100);
                                            if($row['Kmai_sanpham']!=0){ 
                                        ?>
                                        <ins><?php echo number_format($giagoc ,0,',','.').' đ' ?></ins><br><del><?php echo number_format($giakmai ,0,',','.').' đ' ?></del>
                                        <?php }else{ ?>
                                        <ins><?php echo number_format($giakmai ,0,',','.').' đ' ?></ins>
                                        <?php } ?>                            
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Mushroom</a></li>
                            <li><a href="">Margherita</a></li>
                            <li><a href="">BBQ Chicken</a></li>
                            <li><a href="">Vegetable</a></li>
                            <li><a href="">Sausage</a></li>
                        </ul>
                    </div>
                </div>

                <?php 
                    $sql_detail="select* from sanpham where ID_sanpham = $_GET[id]";
                    $qry=mysqli_query($conn,$sql_detail);
                    $row = mysqli_fetch_array($qry);
                    $qry_gallery=mysqli_query($conn,"select * from gallery where ID_sanpham=".$row['ID_sanpham']);
                ?>
                <script type="text/javascript">
                    jQuery(document).ready(function($) {
                        $(".hover").hover(function() {
                            /* Stuff to do when the mouse enters the element */
                            var data=$(this).attr('data-image');
                            $('.actives').removeClass('actives');
                            $('.selected').removeClass('selected');
                            $('.product-main-img img[data-image = '+data+']').addClass('actives');
                            $(this).addClass('selected')
                        }, function() {
                            /* Stuff to do when the mouse leaves the element */
                        });
                    });
                </script>

                    <div class="col-md-5">
                        <div class="product-images">
                            <div class="product-main-img">
                                <img data-image="1" src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>" alt="" class="item actives">
                                 <?php 
                                    $i=2;
                                    while($gallery=mysqli_fetch_array($qry_gallery)){
                                 ?>
                                  <img data-image="<?php echo $i ?>" src="admin/uploads/<?php echo $gallery['Hinh_sanpham'] ?>" alt="" class="item">
                                 <?php 
                                        $i++;
                                    } 
                                ?>
                            </div>
                                        
                            <div class="product-gallery">
                            
                                    <img src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>" class="hover selected" data-image="1">
                
                                <?php 
                                 $i=2;
                                $qry_gallery=mysqli_query($conn,"select * from gallery where ID_sanpham=".$row['ID_sanpham']);
                                    while($gallery=mysqli_fetch_array($qry_gallery)){
                                 ?>
                                
                                    <img src="admin/uploads/<?php echo $gallery['Hinh_sanpham'] ?>" class="hover" data-image="<?php echo $i ?>">
                
                                <?php
                                    $i++; 
                                    } 
                                ?>
                            </div>
                        </div>             
                    </div>


                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                         <div class="product-inner">
                            <h2 class="product-name"><?php echo $row['Ten_sanpham'] ?></h2>
                            <div class="product-inner-price">
                                <?php if($row['Kmai_sanpham']!=0){ 
                                    $giagoc=$row['Gia_sanpham'];
                                    $giakm=$giagoc-($giagoc*$row['Kmai_sanpham'])/100;
                                ?>
                                <ins><?php echo number_format($giakm,0,',','.').' đ' ?></ins> <del><?php echo number_format($giagoc,0,',','.').' đ' ?></del>
                                <?php }else{ 
                                    $giagoc=$row['Gia_sanpham'];
                                ?>
                                <del id="giagoc"><?php echo number_format($giagoc,0,',','.').' đ' ?></del>
                                <?php } ?>
                            </div>    
                                        
                            <form  method="post" action="cart.php?action=addquantity&id=<?php echo $row['ID_sanpham'] ?>" class="cart">
                                <div class="quantity">
                                    <input type="number" size="4" id="quantity-product" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                </div>
                                <button type="submit" name="add-to-cart" class="add_to_cart_button">Thêm vào giỏ</button>
                            </form>   
                                        
                            <div role="tabpanel">
                                <ul class="product-tab" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mô tả sản phảm</a></li>
                                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Đánh giá</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <h2>Mô tả sản phẩm</h2>  
                                        <p> <?php echo $row['Mota_sanpham'] ?></p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="profile">
                                        <?php 

                                            if(isset($_SESSION['thanhvien'])){
                                                include('modules/rating.php');
                                            } 
                                            else{
                                                echo 
                                                '<div class="notlogin">
                                                    <p class="alert">Bạn phải đăng nhập mới được đánh giá sản phẩm</p>
                                                    <a href="login.php" class="btn btn-primary">Đăng nhập</a>
                                                </div>';
                                            }

                                        ?>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        $id_sanpham=$_GET['id'];
                        $sql_review="select Username,Sosao,Nhanxet,Ngaydang from thanhvien,sanpham,danhgia where sanpham.ID_sanpham = danhgia.ID_sanpham and thanhvien.ID_thanhvien=danhgia.ID_thanhvien and danhgia.ID_sanpham='$id_sanpham' group by Username,Sosao,Nhanxet,Ngaydang order by NgayDang desc";
                        $qry=mysqli_query($conn,$sql_review);
                        $nums=mysqli_num_rows($qry);
                     ?>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 product-rating">
                        <h3>NHẬN XÉT CỦA KHÁCH HÀNG</h3>
                        <div class="scroll-rating">
                            <?php 
                                if($nums>0){
                                    while($row=mysqli_fetch_array($qry)) {
                             ?>
                            <div class="nhanxet">
                                <p class="username"><?php echo $row['Username'] ?><p>
                                <div class="sosao">
                                        <?php for($i=1;$i<=$row['Sosao'];$i++){ ?>
                                        <i class="fa fa-star"></i>
                                        <?php } ?>
                                        <?php for($i=($row['Sosao']+1);$i<=5;$i++){ ?>
                                        <i class="far fa-star"></i>
                                        <?php } ?>
                                    
                                </div>
                                <div class="nganghang">
                                    <p class="loinhanxet"><?php echo $row['Nhanxet'] ?></p>
                                    <p class="ngaydang">Ngày đăng: <?php 
                                        $date=strtotime($row['Ngaydang']);
                                        echo date('d/m/Y',$date); 
                                    ?></p>
                                </div>  
                            </div>
                            <?php }
                                }else{
                                    echo '<p class="text-center" style="margin-top:120px;color:#ddd">Chưa có lời đánh giá nào. Bạn hãy là người đầu tiên</p>';
                                }
                             ?>
                        </div>
                    </div>
                
                <div class="row">
                <div class="col-md-12">
                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Món ăn kèm</h2>
                        <div class="related-products-carousel">

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/burger.png" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i>Chi tiết</a>
                                    </div>
                                </div>

                                <h2><a href="">Beef burger</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$7.00</ins>
                                </div> 
                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/hotdog.png" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i>Chi tiết</a>
                                    </div>
                                </div>

                                <h2><a href="">Hotdog</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$4.00</ins>
                                </div> 
                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/khoai-tay-chien.png" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i>Chi tiết</a>
                                    </div>
                                </div>

                                <h2><a href="">Khoai tây</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$1.25</ins>
                                </div> 
                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/salad.png" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i>Chi tiết</a>
                                    </div>
                                </div>

                                <h2><a href="">Salad</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$1.00</ins>
                                </div> 
                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/pepsi.png" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i>Chi tiết</a>
                                    </div>
                                </div>

                                <h2><a href="">Pepsi</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$1.50</ins>
                                </div> 
                            </div>

                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="images/coca.png" alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i>Chi tiết</a>
                                    </div>
                                </div>

                                <h2><a href="">Coca</a></h2>

                                <div class="product-carousel-price">
                                    <ins>$1.50</ins>
                                </div> 
                            </div>                                   
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>

        <div class="container">
            
        </div>
    </div>

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