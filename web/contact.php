<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('modules/head.php') ?>
    <!-- Google Map -->
    <style>
      #map {
        width: 1141px;
        height: 700px;
      }
    </style>

  </head>
  <body>
    <?php include('modules/config.php') ?>
    <?php session_start() ?>
    <?php include('modules/cart-hidden.php') ?>
   
    <?php include('modules/menu.php') ?>
    <?php
        $hoten="";
        $email="";
        $sodt="";
        if(isset($_SESSION['id_thanhvien'])){
            $idthanhvien=$_SESSION['id_thanhvien'];
            $qry_thanhvien =mysqli_query($conn,"select * from thanhvien where ID_thanhvien = '$idthanhvien'");
            $thanhvien=mysqli_fetch_array($qry_thanhvien);
            $hoten=$thanhvien['Hoten'];
            $email=$thanhvien['Email'];
            $sodt=$thanhvien['Sodt'];
        }
        if(isset($_POST['lienhe'])){
            $hoten=$_POST['hoten'];
            $email=$_POST['email'];
            $sodt=$_POST['sodt'];
            $tinnhan=$_POST['tinnhan'];
            $ngaylienhe=date("Y-m-d");

            mysqli_query($conn,"insert into lienhe (Ten_lienhe, Email_lienhe, Sodt_lienhe, Tinnhan, Ngaylienhe, Daxem) values ('$hoten','$email','$sodt','$tinnhan','$ngaylienhe',0)");
            echo "<script type='text/javascript'>alert('Liên hệ của bạn đã được gửi đi, chúng tôi sẽ gửi phản hồi về email cho bạn sớm');window.location.href='index.php'</script>";
        }
     ?>

    <div class="single-product-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>LIÊN <span style="color: #ed1a3b">HỆ</span></h1>

                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d823.910895207924!2d106.66608488217368!3d10.795774442687014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x22d243f88e3ddd7!2sDomino&#39;s+Pizza!5e0!3m2!1sen!2s!4v1528632282700" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg">                   
                    <div class="widget widget-features-box  default">
                        <div class="feature-box-inner colums-1">                           
                            <div class="icon-inner">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="description">
                                335A Lê Văn Sỹ, Phường 1, Tân Bình, Hồ Chí Minh, Việt Nam
                            </div>                              
                        </div>
                    </div>                    
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="widget widget-features-box  default">
                        <div class="feature-box-inner colums-1">                           
                            <div class="icon-inner">
                                <i class="fa fa-phone"></i>
                            </div>                                                       
                            <div class="description">
                                +01 123 456 789<br>
                                +01 987 654 321
                            </div>                          
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="widget widget-features-box  default">                           
                        <div class="feature-box-inner colums-1">
                            <div class="icon-inner">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="description">
                                tlepizzastore@gmail.com<br>
                                pizz123@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">                
                    <div class="widget widget-text-heading  small_center">
                        <h3 class="title">Gửi tin nhắn cho chúng tôi</h3>
                        <div class="description">
                            <p>Mọi chi tiết xin liên trên  gọi điện trực tiếp đến số hotline: 0123456789. <br>
                            Hoặc gửi tin nhắn thông qua Gmail hoặc <a href="https://www.facebook.com/PizzAmazing-415415998511479/">Fanpage</a> của chúng tôi</p>
                        </div>
                    </div>

                    <div role="form" class="wpcf7" id="wpcf7-f431-p420-o1" lang="en-US" dir="ltr">                     
                        <form action="" method="post" class="wpcf7-form" novalidate="novalidate">
                            <div class="contact-us">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>
                                            <input type="text"  name="hoten" value="<?php echo $hoten ?>" size="40" class="wpcf7-text form-control" aria-required="true" aria-invalid="false" placeholder="Họ và tên...">
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span>
                                            <input type="text" name="sodt" value="<?php echo $sodt ?>" size="40" class="wpcf7-text form-control" aria-required="true"  placeholder="Số điện thoại...">
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span>
                                            <input type="text" name="email" value="<?php echo $email ?>" size="40" class="wpcf7-text form-control" aria-required="true" aria-invalid="false" placeholder="Email...">
                                        </span>
                                    </div>
                                </div>
                                <p>
                                    <span>
                                        <textarea cols="40" rows="10" class="form-control" aria-required="true" aria-invalid="false" placeholder="Viết tin nhắn..." name="tinnhan" id="tinnhan"></textarea>
                                        <script>  CKEDITOR.replace('tinnhan');</script>
                                    </span>
                                </p>
                                <div class="text-center">
                                    <input name="lienhe" type="submit" value="Gửi tin nhắn" class="btn btn-theme">      
                                </div>
                            </div>
                        </form>
                    </div>               
            </div>
        </div>
    </div> <!-- End Google Map -->

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