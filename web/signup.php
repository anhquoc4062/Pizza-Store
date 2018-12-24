<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php include('modules/head.php') ?>

  </head>


  <body>

    <?php include('modules/config.php') ?>
    <?php session_start() ?>

    <?php
    $username = "";
    $matkhau = "";
    $rematkhau = "";
    $hoten = "";
    $email = "";
    $sodt = "";
    $thanhpho = "";
    $diachi = "";
        $thongtinthieu="";
        $checkthongtinthieu=0;
        $checkuser=0;
        $existed=0;
        $emk=0;
        $egmail=0;
        $esdt=0;
        $eten=0;
        $eremk=0;
        $checkqmk=0;
     ?>

    <?php 
        if(isset($_POST['dangky'])){
            $username=$_POST['username'];
            if(strlen($username)==0){
                $checkthongtinthieu++;
                $thongtinthieu.="Tài khoản, ";
                $existed=2;
            }
            else{
            $sql = "SELECT Username FROM thanhvien";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                if($row["Username"]==$username){
                    $existed=1;
                    $checkuser=1;
                }
            }
            if($checkuser==1){
                $checkthongtinthieu++;
                $thongtinthieu.="Tài khoản, ";
                $checkuser=0;
                }
            }
            //--------------------------------Tài khoản



            $matkhau=$_POST['matkhau'];
            if(strlen($matkhau)<6){
                    $checkthongtinthieu++;
                    $thongtinthieu.="Mật Khẩu, ";
                    $emk=1;
            }

            //--------------------------------Mật khẩu
            $rematkhau=$_POST['rematkhau'];
            if($rematkhau!=$matkhau){
                $checkthongtinthieu++;
                $eremk=1;
            }
            //--------------------------------Nhập lại mk
            $hoten=$_POST['hoten'];
            if(strlen($hoten)==0){
                $checkthongtinthieu++;
                $thongtinthieu.="Họ tên, ";
                $eten=1;
            }
            //--------------------------------Họ tên
            $email=$_POST['email'];
            $sql1 = "SELECT Email FROM thanhvien";
            $result = mysqli_query($conn, $sql1);
            while($row = mysqli_fetch_assoc($result)){
                if($row["Email"]==$email){
                $checkthongtinthieu++;
                $thongtinthieu.="Email, ";
                    $egmail=2;
                }
            }
            if(strpos($email,'@')==false){
                $checkthongtinthieu++;
                $thongtinthieu.="Email, ";
                $egmail=1;
            }
            //---------------------------------Email
            $sodt=$_POST['sodt'];
            if(strlen($sodt)<10){
                $checkthongtinthieu++;
                $thongtinthieu.="Số điện thoại, ";
                $esdt=1;
            }
            //--------------------------------Số điện thoại
            $thanhpho=$_POST['thanhpho'];
            $diachi=$_POST['diachi'];
/*            if($thongtinthieu!=""){
            $thongtinthieu[strlen($thongtinthieu)-1]=NULL;
            $thongtinthieu[strlen($thongtinthieu)-2]=NULL;
        }*/

            if($checkthongtinthieu==0){

                $thongtinthieu="";
                $ngaytao=date("Y-m-d");
                $checkthongtinthieu=0;
               /* echo "<script>window.location=login.php</script>";
                echo "<script> alert('Đăng ký thành công'); </script>";*/
                 $sql_thanhvien="insert into thanhvien (Username, Password, Hoten, Email, Sodt, ID_thanhpho, Diachi, Ngaytao) values ('$username','$matkhau','$hoten','$email','$sodt','$thanhpho','$diachi','$ngaytao')";
                $_SESSION["checked"]="1";
                $qry=mysqli_query($conn,$sql_thanhvien);
                echo '<script type="text/javascript">window.location.href="login.php"</script>';


            }



            //header('location:login.php');

        }
    ?>

                 <?php 
             include('modules/cart-hidden.php');
              include('modules/menu.php');
             ?>

    
    <div class="single-product-area">
        <div class="container">
            <div class="row text-center">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="dangky login">
                        <h4>Đăng ký thành viên</h4>
                        <div class="username">
                            <table>
                                <tr>
                                    <th>Tài khoản (*)</th>
                                    <td><input type="text" name="username" placeholder="Điền tên tài khoản" id="username" value="<?php echo $username ?>">                         
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <?php 
                                        if($existed==2){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Nhập tài khoản</p>';
                                        }
                                        if($existed==1){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Tài khoản đã tồn tại</p>';
                                        }
                                        $existed=0;
                                        ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>Họ và tên (*)</th>
                                    <td><input type="text" name="hoten" placeholder="Điền họ và tên" id="hoten" value="<?php echo $hoten ?>">                                    
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <?php 
                                        if($eten==1){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Chưa nhập họ tên</p>';
                                        }
                                        $eten=0;
                                        ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email (*)</th>
                                    <td><input type="text" name="email" placeholder="Điền email" id="email" value="<?php echo $email ?>">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <?php 
                                        if($egmail==1){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Email không đúng</p>';
                                        }
                                        if($egmail==2){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Email đã tồn tại</p>';
                                        }
                                        $egmail=0;
                                        ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại (*)</th>
                                    <td><input type="text" name="sodt" placeholder="Điền số điện thoại" id="sodt" value="<?php echo $sodt ?>">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <?php 
                                        if($esdt==1){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Số điện thoại không chính xác</p>';
                                        }
                                        $esdt=0;
                                        ?>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mật khẩu (*)</th>
                                    <td><input type="password" name="matkhau" placeholder="Điền mật khẩu" id="password">
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <?php 
                                        if($emk==1){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Mật khẩu ít nhất 6 ký tự</p>';
                                        }
                                        $emk=0;
                                        ?>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Nhập lại mật khẩu (*)</th>
                                    <td><input type="password" name="rematkhau" placeholder="Điền mật khẩu" id="rematkhau">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        <?php 
                                        if($eremk==1){
                                            echo '<p class="minitext" style="color:red; text-align:center;">Mật khẩu không khớp</p>';
                                        }
                                        $eremk=0;
                                        ?>
                                        
                                    </td>
                                </tr>
                                
                                <tr>
                                    <th>Tỉnh/thành phố</th>
                                    <td><select name="thanhpho" style="color: black">
                                        <?php
                                            $tp=mysqli_query($conn,"select * from thanhpho");
                                            while($row=mysqli_fetch_array($tp)){
                                         ?>
                                        <option value="<?php echo $row['ID_thanhpho'] ?>"><?php echo $row['Ten_thanhpho'] ?></option>
                                        <?php } ?>
                                    </select></td>

                                <tr>
                                    <th>Địa chỉ</th>
                                    <td><input type="text" name="diachi" placeholder="Điền địa chỉ" id="diachi" value="<?php echo $diachi ?>"></td>
                                </tr>

                            </table>
                        </div>
                        <input type="submit" class="btn btn-success" name="dangky" value="Đăng kí tài khoản"></input>
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