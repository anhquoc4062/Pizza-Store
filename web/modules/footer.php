<div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <img id="logo-footer" src="images/logo.png">
                        <p>Tiệm bánh Pizza ABC</p>   
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Khách hàng</h2>
                        <ul>
                            <li><a href="#">Tài khoản</a></li>
                            <li><a href="#">Liên hệ dịch vụ</a></li>
                            <li><a href="#">Trang chủ</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Menu</h2>
                        <ul>
                            <?php 
                                $theloai=mysqli_query($conn,"select * from theloai");
                                while($theloai_r=mysqli_fetch_array($theloai)){
                             ?>
                            <li><a href="shop.php?theloai=<?php echo $theloai_r['ID_loai'] ?>&page=1"><?php echo $theloai_r['Ten_loai'] ?></a></li>
                            <?php } ?>
                            <!-- <li><a href="shop_thucuong.html">Thức uống</a></li>
                            <li><a href="shop_khaivi.html">Khai vị</a></li> -->
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Thông tin</h2>
                        <p>Đăng ký với chúng tôi để nhận những thông tin sớm nhất về chương trình khuyến mãi và các thông tin khác !</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Nhập email...">
                                <input type="submit" value="Đăng ký">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="footer-social">
                            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" target="_blank"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2018 Pizza ABC. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">QTBH</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fab fa-cc-discover"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->