
<?php 
	$check_exist=0;
	$thanhtien=0;
	$count=0;
	 $check_session=0;
	 if(isset($_SESSION['cart'])){
    	foreach ($_SESSION['cart'] as $id=>$value) {
        	$check_session++;
    	}
	}
	if($check_session>0){
		$check_exist=1;
		$sql="select * from sanpham where ID_sanpham in (";

		foreach ($_SESSION['cart'] as $id=>$value){
			$sql.=$id.',';
		}
		$sql=substr($sql,0,-1).")";

		$qry = mysqli_query($conn,$sql);

	}
	else{
		$check_exist=0;
	}


 ?>
<div class="table_cart" id="icon-cart">
		<div class="scroll-side">
			<table class="cart_doc">
				<?php if($check_exist==1){
						while($row=mysqli_fetch_array($qry)){
							$count++;
							$quantity = $_SESSION['cart'][$row['ID_sanpham']]['quantity'];
							$giasanpham = $row['Gia_sanpham']-($row['Gia_sanpham']*$row['Kmai_sanpham'])/100;
							$thanhtien+=$quantity*$giasanpham;
				 ?>
	           <tr>
		           	<td>
		           		<div class="container">
		           			<div class="row">
    							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 img_p">
    								<img src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>" width="100px"></div>
    							<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 info_p"><?php echo $row['Ten_sanpham'] ?><br><?php echo number_format($giasanpham ,0,',','.').' đ'?> x <?php echo $quantity ?></div>
    						</div>
    					</div>
		    		</td>
	    		</tr>
	    		<?php 
	    				}
	    			}else{ ?>

	    			<tr>
	    				<td>
	    					<div class="container">
	    						<div class="row">
            						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="no-product">Chưa có sản phẩm trong giỏ</div>
            					</div>
            				</div>
            			</td>
            		</tr>
	    		<?php } ?>
	    	</table>

        </div>
        
        <div class="cart_cuoi">
            <hr>
            <p id="total">Tổng cộng: <?php echo  number_format($thanhtien ,0,',','.').' đ' ?></p>
            <a href="cart.php" class="btn btn-primary">GIỎ HÀNG</a>
            <a href="checkout.php" class="btn btn-primary">THANH TOÁN</a>
        </div>
</div>
