<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php include('modules/head.php') ?>
    <script type="text/javascript" src="js/cart.js"></script>

  </head>
  <body>

    <?php session_start() ?>

    <?php include('modules/config.php') ?>
    <?php 
    //Thêm sản phẩm vào giỏ hàng
        if(isset($_GET['action'])&&$_GET['action']=='addquantity'){
            $id=$_GET['id'];
            $quantity=$_POST['quantity'];
            if(isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id]['quantity']+=$quantity;
            }
            else{
                $_SESSION['cart'][$id]=array(
                    "quantity"=>$quantity,
                );
            }
            header('refresh:0; url=cart.php');
        }
        else if(isset($_GET['action'])&&$_GET['action']=='remove'){
            $id=$_GET['id'];
            unset($_SESSION['cart'][$id]);
            header('refresh:0; url=cart.php');
        }

        if(isset($_POST['update_cart'])){
            foreach($_POST['quantity'] as $key=>$value){
                if($value==0){
                    unset($_SESSION['cart'][$key]);
                }
                else{
                    $_SESSION['cart'][$key]['quantity']=$value;
                }
            }
        }
    ?>

    <?php include('modules/cart-hidden.php') ?>

   <?php include('modules/menu.php') ?>
    
    <div class="product-cart-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>GIỎ <span style="color: #ed1a3b">HÀNG</span></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Tìm kiếm sản phẩm</h2>
                        <form action="#">
                            <input type="text" placeholder="Tên sản phẩm...">
                            <input type="submit" value="Tìm kiếm">
                        </form>
                    </div>
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Sản phẩm liên quan</h2>
                        <div class="thubmnail-recent">
                            <img src="images/almond.png" class="recent-thumb" alt="">
                            <h2><a href="single-product.php">ALMOND CITRUS SEAFOOD</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="images/pizza5.png" class="recent-thumb" alt="">
                            <h2><a href="single-product.php">SURF AND TURF</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$800.00</del>
                            </div>                             
                        </div>
                    </div>

                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Thông báo</h2>
                        <ul>
                            <li><a href="#">Pizza Hot</a></li>
                            <li><a href="#">Pepsi-Niềm vui bất tận</a></li>
                            <li><a href="#">Giảm giá 20% dành cho combo "Couple"</a></li>
                        </ul>
                    </div>
                    
                </div>

                
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="cart.php">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Tên sản phẩm</th>
                                            <th class="product-price">Giá</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-subtotal">Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart-body">

                                       <?php 
                                       $check=0;
                                       if(isset($_SESSION['cart'])){
                                       foreach ($_SESSION['cart'] as $id=>$value) {
                                               $check++;
                                           }
                                       }
                                       if($check>0){
                                       
                                           $sql_cartm="select * from sanpham where ID_sanpham in (";
                                           foreach ($_SESSION['cart'] as $id=>$value) {
                                               $sql_cartm.=$id.',';
                                           }
                                           $sql_cartm=substr($sql_cartm,0,-1).")";//xóa dấu phẩy ở cuối
                                           $qrym=mysqli_query($conn,$sql_cartm);
                                           $exist=mysqli_num_rows($qrym);
                                           $thanhtien=0;
                                       
                                           while($row=mysqli_fetch_array($qrym)){ 
                                               $quantity=$_SESSION['cart'][$row['ID_sanpham']]['quantity'];
                                                $giasanpham = $row['Gia_sanpham']-($row['Gia_sanpham']*$row['Kmai_sanpham'])/100;
                                                $thanhtien+=$quantity*$giasanpham;
                                       ?>
                                        
                                        <tr class="cart_item">
                                        
                                            <td class="product-remove"><a title="Remove this item" class="remove" href="cart.php?action=remove&id=<?php echo $row['ID_sanpham'] ?>">×</a> </td>
                                        
                                            <td class="product-thumbnail"><a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>"></a></td>
                                        
                                            <td class="product-name"><a href="single-product.php?id=<?php echo $row['ID_sanpham'] ?>"><?php echo $row['Ten_sanpham'] ?></a> </td>
                                        
                                            <td class="product-price"><span class="amount"><?php echo number_format($giasanpham ,0,',','.').' đ' ?></span> </td>
                                        
                                            <td class="product-quantity"><div class="quantity buttons_added"><input id="min<?php echo $row['ID_sanpham'] ?>" type="button" class="minus" value="-"><input type="number" id="numb<?php echo $row['ID_sanpham'] ?>" size="4" name="quantity[<?php echo $row['ID_sanpham'] ?>]" title="Qty" value="<?php echo $quantity ?>" min="0" step="1"><input type="button" id="plu<?php echo $row['ID_sanpham'] ?>" class="plus" value="+"></div></td>
                                        
                                            <td class="product-subtotal"><span class="amount"><?php echo number_format($quantity*$giasanpham ,0,',','.').' đ' ?></span> </td>
                                        </tr>
                                        
                                        <?php } 

                                        }else{ ?>
                                            <tr class="cart_item">
                                            <td colspan="6" class="product-remove" style="color:white; font-size:15px; height:200px">Chưa có sản phẩm trong giỏ</td>
                                            </tr>
                                        <?php } 
                                        ?>
                                       
                                    </tbody>

                                     <tr>
                                            <td class="actions" colspan="6">
                                                <div class="coupon">
                                                    <label for="coupon_code">Enter Coupon:</label>
                                                    <input type="text" placeholder="Coupon code" value="" id="coupon_code" class="input-text" name="coupon_code">
                                                    <input type="submit" value="Áp dụng" name="apply_coupon" class="button">
                                                    <input type="button" id="clear-all" value="Xóa hết">
                                                </div>

                                                <div class="end_cart">
                                                    <input type="submit" value="Cập nhật giỏ hàng" name="update_cart" class="update-button">
                                                    <input type="button" value="Tiến hành thanh toán" name="proceed" class="checkout-button button alt wc-forward btn btn-primary" onclick="window.location.href='checkout.php'">
                                                </div>
                                                
                                            </td>
                                        </tr>
                                </table>
                            </form>

                        <div class="cart-collaterals">


                           <div class="container">
                               <div class="row">
                                   <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-push-4 col-sm-push-4 col-md-push-4 col-lg-push-4">
                                    <div class="cart_totals ">
                                <h2>Tổng tiền thanh toán</h2>

                                <table cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tổng phí sản phẩm</th>
                                            <td><span id="amount"><?php echo number_format($thanhtien ,0,',','.').' đ' ?></span></td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Phí giao hàng</th>
                                            <td>Miễn phí giao hàng</td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Tổng trả</th>
                                            <td><strong><span id="paying">0</span></strong> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                                       
                                   </div><!--end col-->
                                   <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-push-4 col-sm-push-4 col-md-push-4 col-lg-push-4">
                                       <form method="post" action="#" class="shipping_calculator">
                                <h2><a class="shipping-calculator-button" data-toggle="collapse" href="#calcalute-shipping-wrap" aria-expanded="false" aria-controls="calcalute-shipping-wrap">Thông tin giao hàng</a></h2>

                                <section id="calcalute-shipping-wrap" class="shipping-calculator-form collapse">

                                <p class="form-row form-row-wide">
                                <select rel="calc_shipping_state" class="country_to_state" id="calc_shipping_country" name="calc_shipping_country">
                                    <option value="">Select a country…</option>
                                    <option value="AX">Åland Islands</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="PW">Belau</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo (Brazzaville)</option>
                                    <option value="CD">Congo (Kinshasa)</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">CuraÇao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                    <option value="DK">Denmark</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="DO">Dominican Republic</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egypt</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="GQ">Equatorial Guinea</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Ethiopia</option>
                                    <option value="FK">Falkland Islands</option>
                                    <option value="FO">Faroe Islands</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="FI">Finland</option>
                                    <option value="FR">France</option>
                                    <option value="GF">French Guiana</option>
                                    <option value="PF">French Polynesia</option>
                                    <option value="TF">French Southern Territories</option>
                                    <option value="GA">Gabon</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="DE">Germany</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GR">Greece</option>
                                    <option value="GL">Greenland</option>
                                    <option value="GD">Grenada</option>
                                    <option value="GP">Guadeloupe</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="HT">Haiti</option>
                                    <option value="HM">Heard Island and McDonald Islands</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungary</option>
                                    <option value="IS">Iceland</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IR">Iran</option>
                                    <option value="IQ">Iraq</option>
                                    <option value="IM">Isle of Man</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italy</option>
                                    <option value="CI">Ivory Coast</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japan</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordan</option>
                                    <option value="KZ">Kazakhstan</option>
                                    <option value="KE">Kenya</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="KG">Kyrgyzstan</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LB">Lebanon</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libya</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lithuania</option>
                                    <option value="LU">Luxembourg</option>
                                    <option value="MO">Macao S.A.R., China</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MY">Malaysia</option>
                                    <option value="MV">Maldives</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MH">Marshall Islands</option>
                                    <option value="MQ">Martinique</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="MU">Mauritius</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">Mexico</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldova</option>
                                    <option value="MC">Monaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MA">Morocco</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Nauru</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NL">Netherlands</option>
                                    <option value="AN">Netherlands Antilles</option>
                                    <option value="NC">New Caledonia</option>
                                    <option value="NZ">New Zealand</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Niger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NF">Norfolk Island</option>
                                    <option value="KP">North Korea</option>
                                    <option value="NO">Norway</option>
                                    <option value="OM">Oman</option>
                                    <option value="PK">Pakistan</option>
                                    <option value="PS">Palestinian Territory</option>
                                    <option value="PA">Panama</option>
                                    <option value="PG">Papua New Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Peru</option>
                                    <option value="PH">Philippines</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PL">Poland</option>
                                    <option value="PT">Portugal</option>
                                    <option value="QA">Qatar</option>
                                    <option value="IE">Republic of Ireland</option>
                                    <option value="RE">Reunion</option>
                                    <option value="RO">Romania</option>
                                    <option value="RU">Russia</option>
                                    <option value="RW">Rwanda</option>
                                    <option value="ST">São Tomé and Príncipe</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="SH">Saint Helena</option>
                                    <option value="KN">Saint Kitts and Nevis</option>
                                    <option value="LC">Saint Lucia</option>
                                    <option value="SX">Saint Martin (Dutch part)</option>
                                    <option value="MF">Saint Martin (French part)</option>
                                    <option value="PM">Saint Pierre and Miquelon</option>
                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                    <option value="SM">San Marino</option>
                                    <option value="SA">Saudi Arabia</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leone</option>
                                    <option value="SG">Singapore</option>
                                    <option value="SK">Slovakia</option>
                                    <option value="SI">Slovenia</option>
                                    <option value="SB">Solomon Islands</option>
                                    <option value="SO">Somalia</option>
                                    <option value="ZA">South Africa</option>
                                    <option value="GS">South Georgia/Sandwich Islands</option>
                                    <option value="KR">South Korea</option>
                                    <option value="SS">South Sudan</option>
                                    <option value="ES">Spain</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="SD">Sudan</option>
                                    <option value="SR">Suriname</option>
                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                    <option value="SZ">Swaziland</option>
                                    <option value="SE">Sweden</option>
                                    <option value="CH">Switzerland</option>
                                    <option value="SY">Syria</option>
                                    <option value="TW">Taiwan</option>
                                    <option value="TJ">Tajikistan</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TH">Thailand</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad and Tobago</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="TR">Turkey</option>
                                    <option value="TM">Turkmenistan</option>
                                    <option value="TC">Turks and Caicos Islands</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UA">Ukraine</option>
                                    <option value="AE">United Arab Emirates</option>
                                    <option selected="selected" value="GB">United Kingdom (UK)</option>
                                    <option value="US">United States (US)</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VA">Vatican</option>
                                    <option value="VE">Venezuela</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="WF">Wallis and Futuna</option>
                                    <option value="EH">Western Sahara</option>
                                    <option value="WS">Western Samoa</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbabwe</option>
                                </select>
                                </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_state" name="calc_shipping_state" placeholder="Tỉnh / Thành phố" value="" class="input-text"> </p>

                                <p class="form-row form-row-wide"><input type="text" id="calc_shipping_postcode" name="calc_shipping_postcode" placeholder="Mã bưu điện" value="" class="input-text"></p>


                                <p><button class="button" value="1" name="calc_shipping" type="submit">Update Totals</button></p>

                                </section>
                            </form>
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