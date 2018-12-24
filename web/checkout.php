<!DOCTYPE html>
<html lang="en">
  <head>

    <?php include('modules/head.php') ?>
    
  </head>
  <body>

    <?php include('modules/config.php') ?>
    <?php session_start() ?>

    <?php include('modules/cart-hidden.php') ?>

   <?php include ('modules/menu.php') ?>

   <?php 
        if(isset($_POST['thanhtoan'])){
            $ten=$_POST['hoten'];
            $sodt=$_POST['sodt'];
            $email=$_POST['email'];
            $diachi=$_POST['diachi'];
            $thanhpho=$_POST['thanhpho'];
            $ghichu=$_POST['ghichu'];
            $ngaydat=date("Y-m-d");

            mysqli_query($conn,"insert into donhang (Ten_khachhang, Email, Sdt, Diachi, Thanhpho, Ghichu, Tinhtrang, Ngaydat) values ('$ten', '$email','$sodt', '$diachi', '$thanhpho', '$ghichu', 0, '$ngaydat')");
            // lấy id đơn hàng cuối cùng
            $id_donhang=mysqli_insert_id($conn);

            foreach ($_SESSION['cart'] as $id=>$value) {
                $quantity=$_SESSION['cart'][$id]['quantity'];
                mysqli_query($conn,"insert into chitietdonhang (ID_donhang,ID_sanpham,Soluong) values ('$id_donhang','$id','$quantity')");
                
            }
            unset($_SESSION['cart']);
            echo "<script type='text/javascript'>alert('Thanh toán thành công, đơn hàng đã được gửi đi');window.location.href='index.php'</script>";

        }
    ?>
    
    
    <div class="single-product-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h1>THANH<span style="color: #ed1a3b"> TOÁN</span></h1>
                </div>
                
                <div class="col-md-8 col-md-push-2">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <?php  
                                $hoten="";
                                $email="";
                                $diachi="";
                                $sodt="";
                                $thanhpho="";
                                $username="";
                            ?>
    
                            <?php if(!isset($_SESSION['id_thanhvien'])){ 

                            ?>
                            <div class="woocommerce-info">Đã là thành viên? Đăng nhập để lấy thông tin <a href="login.php" aria-expanded="false">Đăng nhập</a>
                            </div>
                            <?php }else{
                                $id = $_SESSION['id_thanhvien'];
                                    $qry_thanhvien=mysqli_query($conn,"select * from thanhvien,thanhpho where thanhvien.ID_thanhpho=thanhpho.ID_thanhpho and ID_thanhvien = '$id'");
                                    $row=mysqli_fetch_array($qry_thanhvien);
                                    $username=$row['Username'];
                                    $hoten=$row['Hoten'];
                                    $email=$row['Email'];
                                    $diachi=$row['Diachi'];
                                    $sodt=$row['Sodt'];
                                    $thanhpho=$row['Ten_thanhpho'];
                                }
                            ?>

                            <div class="woocommerce-info">Bạn có mã khuyến mãi? <a class="showcoupon" data-toggle="collapse" href="#coupon-collapse-wrap" aria-expanded="false" aria-controls="coupon-collapse-wrap">Nhập mã khuyến mãi</a>
                            </div>

                            <form id="coupon-collapse-wrap" method="post" class="checkout_coupon collapse">

                                <p class="form-row form-row-first">
                                    <input type="text" value="" id="coupon_code" placeholder="Nhập mã khuyến mãi" class="input-text" name="coupon_code">
                                </p>

                                <p class="form-row form-row-last">
                                    <input type="submit" value="Xác nhận" name="apply_coupon" class="button">
                                </p>

                                <div class="clear"></div>
                            </form>

                            <form enctype="multipart/form-data" action="#" class="checkout" method="post" name="checkout">

                                <div id="customer_details" class="col2-set">
                                    <div class="col-01">
                                        <div class="woocommerce-billing-fields">
                                            <h3>Chi tiết đơn hàng</h3>

                                            <?php if(!isset($_SESSION['id_thanhvien'])){  ?>

                                            <?php } ?>

                                            <p id="billing_full_name_field" class="form-row form-row-first validate-required">
                                                <label class="" for="billing_first_name">Họ và tên <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $hoten ?>" placeholder="Nhập họ tên đầy đủ..." id="billing_first_name" name="hoten" class="input-text ">
                                            </p>

                                            <p id="billing_address_1_field" class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_address_1">Địa chỉ <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $diachi ?>" placeholder="Nhập địa chỉ..." id="billing_address_1" name="diachi" class="input-text ">
                                            </p>

                                            <p id="billing_city_field" class="form-row form-row-wide address-field validate-required" data-o_class="form-row form-row-wide address-field validate-required">
                                                <label class="" for="billing_city">Thị trấn/Thành phố <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $thanhpho ?>" placeholder="Town / City" id="billing_city" name="thanhpho" class="input-text ">
                                            </p>

                                            <div class="clear"></div>

                                            <p id="billing_email_field" class="form-row form-row-first validate-required validate-email">
                                                <label class="" for="billing_email">Email <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $email ?>" placeholder="" id="billing_email" name="email" class="input-text ">
                                            </p>

                                            <p id="billing_phone_field" class="form-row form-row-last validate-required validate-phone">
                                                <label class="" for="billing_phone">Số điện thoại <abbr title="required" class="required">*</abbr>
                                                </label>
                                                <input type="text" value="<?php echo $sodt ?>" placeholder="" id="billing_phone" name="sodt" class="input-text ">
                                            </p>
                                            <div class="clưear"></div>

                                            <div class="woocommerce-shipping-fields">
                                            <h3 id="ship-to-different-address">
                                            <label class="checkbox" for="ship-to-different-address-checkbox">Giao đến địa chỉ khác?</label>
                                            <input type="checkbox" value="1" name="ship_to_different_address" checked="checked" class="input-checkbox" id="ship-to-different-address-checkbox">

                                        </div>

                                                 <p id="order_comments_field" class="form-row notes">
                                                <label class="" for="order_comments">Ghi chú đặt hàng</label>
                                                <textarea cols="5" rows="2" placeholder="Notes about your order, e.g. special notes for delivery." id="order_comments" class="input-text " name="ghichu"></textarea>
                                            </p>

                                        </div>                                
                                    </div>      

                                <h3 id="order_review_heading">Đơn hàng của bạn</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Sản phẩm</th>
                                                <th class="product-total">Tổng cộng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                                /*echo $sql;*/
                                                $thanhtien=0;  
                                                if($check_exist==1){//nếu có sản phẩm trong giỏ
                                                    $qry=mysqli_query($conn,$sql);//$sql="SELECT * FROM SANPHAM IN (những sản phẩm trong giỏ hàng)"
                                                    while($row=mysqli_fetch_array($qry)){
                                                        $quantity = $_SESSION['cart'][$row['ID_sanpham']]['quantity'];
                                                        $giasanpham = $row['Gia_sanpham']-($row['Gia_sanpham']*$row['Kmai_sanpham'])/100;
                                                        $thanhtien+=$quantity*$giasanpham;
                                             ?>

                                            <tr class="cart_item">
                                                <td class="product-name"><?php echo $row['Ten_sanpham'] ?> <strong class="product-quantity">× <?php echo $quantity ?></strong></td>
                                                <td class="product-total"><span class="amount"><?php echo number_format($giasanpham*$quantity ,0,',','.').' đ' ?></span></td>
                                            </tr>
                                                <?php }
                                                }else{ //nếu không có?>

                                            <tr class="cart_item">
                                                <td class="product-name" colspan="2">Chưa có sản phẩm trong đơn hàng</td>
                                            </tr>
                                                <?php } ?>

                                        </tbody>
                                        <tfoot>

                                            <tr class="cart-subtotal">
                                                <th>Tổng tiền</th>
                                                <td><span  id ="isubtotal" class="amount"><?php echo number_format($thanhtien ,0,',','.').' đ' ?></span>
                                                </td>
                                            </tr>

                                            <tr class="shipping">
                                                <th>Chi phí vận chuyển</th>
                                                <td>
                                                    Miễn phí
                                                    <input type="hidden" class="shipping_method" value="free_shipping" id="shipping_method_0" data-index="0" name="shipping_method[0]">
                                                </td>
                                            </tr>


                                            <tr id ="iorder-total" class="order-total">
                                                <th>Tổng trả</th>
                                                <td><strong><span  id ="ipaying" class="amount"><?php echo number_format($thanhtien ,0,',','.').' đ' ?></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>


                                    <div id="payment">
                                        <ul class="payment_methods methods">
                                            <li class="payment_method_bacs">
                                                <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                                <label for="payment_method_bacs">Chuyển khoản trực tiếp </label>
                                                <div class="payment_box payment_method_bacs">
                                                    <p>Để đảm bảo chi phí chi trả của bạn được chuyển thẳng đến tài khoản chúng tôi. Hãy sử dụng ID đơn hàng của bạn như hình thức chi trả. Đơn hàng của bạn sẽ không được chuyển đi cho đến khi tài khoản chúng tôi nhận được tiền cọc.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_cheque">
                                                <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                                <label for="payment_method_cheque">Thanh toán bằng Séc </label>
                                                <div style="display:none;" class="payment_box payment_method_cheque">
                                                    <p>Hãy đến Pizza ABC, đường DEF, quận GHI, TP Hồ Chí Minh để thực hiện giao dịch.</p>
                                                </div>
                                            </li>
                                            <li class="payment_method_paypal">
                                                <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">
                                                <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/gb/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://vothanhdien.com/paypal-la-gi/">Paypal là gì?</a>
                                                </label>
                                                <div style="display:none;" class="payment_box payment_method_paypal">
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="form-row place-order">

                                            <input type="submit" data-value="Place order" value="Thanh toán" id="place_order" name="thanhtoan" class="button alt">


                                        </div>

                                        <div class="clear"></div>

                                    </div>
                                </div>
                            </form>

                        </div>                       
                    </div>                    
                </div>
            </div>
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