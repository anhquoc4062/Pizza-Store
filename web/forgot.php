<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php include('modules/head.php') ?>

  </head>


  <body>

    <?php include('modules/config.php') ?>
    <?php session_start() ?>
    <?php
        $checkqmk=0;
        $dem=0;
    ?>
    <?php
        if(isset($_POST['qmk'])){
            $sql = "SELECT * FROM thanhvien";
            $result = mysqli_query($conn, $sql);
            $email=$_POST['mail-input'];
            while($row = mysqli_fetch_assoc($result)){
                if($row["Email"]==$email){
                    include('modules/quenmatkhau.php');
                    $checkqmk=2;
                    $dem++;
                }
            }
            if(strlen($email)==0||$dem==0){
                $checkqmk=1;
            }
        }
    ?>

    <?php include('modules/cart-hidden.php') ?>
    <?php include('modules/menu.php') ?>

    <div class="single-product-area">
        <div class="container">
            <div class="row text-center">
                <form action="" method="post">
                    <div class="quenmatkhau login">
                            <h4>Quên mật khẩu</h4>
                            <div style="color:#0069a8;font-size: 15px"><span style="color: red">* </span>Cung cấp Email đã đăng ký để nhận lại tài khoản và mật khẩu.</div>
                            <br>
                            <input style="width: 600px" class="inputqmk" type="text" name="mail-input" placeholder="Nhập Email...">
                            <input style="height: 42px;width: 60px" type="submit" class="btn btn-success" name="qmk" value="Gửi"></input>
                            <?php
                                if($checkqmk==2){
                                    echo '<p class="minitext" style="color:#27ae60; text-align:center;font-size:15px">Tài khoản và mật khẩu đã được gửi về hộp thư!</p>';

                                }
                                if($checkqmk==1){
                                    echo '<p class="minitext" style="color:red; text-align:center;font-size:15px">Mail không tồn tại, vui lòng kiểm tra lại!</p>';
                                }
                                $checkqmk=0;
                            ?>
                    </div>
                </form>
            </div>
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