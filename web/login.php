<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php include('modules/head.php') ?>

  </head>


  <body>

    <?php include('modules/config.php') ?>
    <?php session_start() ?>
        <?php 

        if(isset($_SESSION['thanhvien'])){
             echo '<script type="text/javascript">window.location.href="index.php"</script>';
        }
        $check=0;
        if(isset($_POST['login'])){
            $username=$_POST['username'];
            $password=$_POST['password'];

            $sql_user="select * from thanhvien where Username='$username' and Password = '$password' limit 1";
            $qry=mysqli_query($conn,$sql_user);
            $exist=mysqli_num_rows($qry);
            if($exist>0){
                $row=mysqli_fetch_array($qry);
                $_SESSION['thanhvien']=$username;
                $_SESSION['id_thanhvien']=(string)$row['ID_thanhvien'];
                 echo '<script type="text/javascript">window.location.href="index.php"</script>';
            }
            else{
                $check=1;
            }
        }

    if(isset($_SESSION["checked"])){
        if($_SESSION["checked"]=="1"){
            echo "<script> alert('Đăng ký thành công')</script>";
            $_SESSION["checked"]="0";
        }
    }
    ?>

    <?php include('modules/cart-hidden.php') ?>
    <?php include('modules/menu.php') ?>

    <div class="single-product-area">
        <div class="container">
            <div class="row text-center">
                <form action="" method="post">
                    <div class="login">
                        <h4>Đăng nhập</h4>
                        <?php if($check==1) {?>
                        <p style="color:red">Tài khoản không tồn tại</p>
                        <?php } ?>
                        <div class="username">
                            <div class="icon-login">
                                <i class="fas fa-user"></i>
                            </div>
                            <input type="text" name="username" placeholder="Tài khoản">
                        </div>
                        
                        <div class="password">
                            <div class="icon-login">
                                <i class="fas fa-lock"></i>
                            </div>
                            <input type="password" name="password" placeholder="Mật khẩu">
                        </div>

                        <br>
                        <input type="submit" class="btn btn-primary" name="login" value="Đăng nhập"></button>
                        <input type="button" id="exit-login" class="btn btn-primary" onclick="window.location.href='index.php'" value="TRANG CHỦ"></button>
                        <br>
                        <a href="signup.php" class="btn btn-success">ĐĂNG KÝ TÀI KHOẢN</a>
                        <br><br>
                        <a href="forgot.php" style="font-size: 15px;">Quên mật khẩu?</a>
                    </div> <!-- dang nhap -->
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