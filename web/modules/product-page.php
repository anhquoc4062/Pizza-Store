  <?php 
        //kIỂM TRA SAO SẢN PHẨM
        $kiemtrasao="select sanpham.ID_sanpham, round(AVG(Sosao)) as Sao_sanpham FROM sanpham,danhgia where sanpham.ID_sanpham = danhgia.ID_sanpham GROUP by sanpham.ID_sanpham";
        $check=mysqli_query($conn,$kiemtrasao);
        while($dong=mysqli_fetch_array($check)){
            $sao=$dong['Sao_sanpham'];
            $id=$dong['ID_sanpham'];
            $capnhatsao="update sanpham  set Sao_sanpham='$sao' where ID_sanpham='$id'";
            mysqli_query($conn,$capnhatsao);
        }

        //Phân thể loại sản phẩm
        if(isset($_GET['theloai'])){
            if($_GET['theloai']!=0){
            $theloai=$_GET['theloai'];
             $sql_product="select * from sanpham where ID_loai='$theloai'";
            }
            else{
                $sql_product="select * from sanpham";
            }

        }

        $trang=$_GET['page'];
        $product=8*($trang-1);

        $sql_product.=" limit ".$product.", 8";
        
        $qry=mysqli_query($conn,$sql_product);

   ?>

  <div class="single-product-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1>THỰC ĐƠN <span style="color: #ed1a3b">CHÍNH</span></h1>
                </div>
            </div>
            <div class="row">
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php include('modules/search.php');
                    if($check_search==1){
                        echo '<p class="thongbao_search">Tìm thấy '.$count_search.' sản phẩm với từ khóa "'.$giatri.'"</p>';
                    }
                     ?>
                </div>
            </div>
            <div class="row">
                <?php 

                    if($check_search==0){
                    while($row=mysqli_fetch_array($qry)){
                ?>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <a href="single-product.php?id=<?php echo $row['ID_sanpham'] ?>">
                            <?php if($row['Kmai_sanpham']!=0){ ?>
                                <div class="kmai">-<?php echo $row['Kmai_sanpham'] ?>%</div>
                            <?php }?>
                            <div class="image">
                                <img width="200" height="200" src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>" alt="">
                            </div>
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

                                        echo number_format($giakhuyenmai,0,',','.').' đ';   
                                    ?>  
                                    </ins>
                                    <?php }else{ ?>
                                    <del id="giagoc"><?php echo number_format($row['Gia_sanpham'],0,',','.').' đ';?></del>
                                    <br>
                                    <ins id="giavohinh">...</ins>
                                    <?php } ?>
                                </p>
                            </div>
                        </a> 
                        <div class="order">
                            <?php 
                                $theloai=$_GET['theloai'];
                                $page=$_GET['page'];
                             ?>
                            <a href="shop.php?theloai=<?php echo $theloai ?>&page=<?php echo $page ?>&action=add&id=<?php echo $row['ID_sanpham'] ?>" class="add-to-cart btn btn-default">Đặt hàng</a>
                        </div>    
                    </div>
                </div>
                <?php } ?>

                <!-- phân trang sản phẩm -->
                <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?php 

                                 if(isset($_GET['theloai'])){
                                    if($_GET['theloai']!=0){
                                    $theloai=$_GET['theloai'];
                                     $sql_product="select * from sanpham where ID_loai='$theloai'";
                                    }
                                    else{
                                        $sql_product="select * from sanpham";
                                    }

                                }

                                $qry=mysqli_query($conn,$sql_product);

                                $count=mysqli_num_rows($qry);
                                echo $count;
                                $page=ceil($count/8);
                                $theloai = $_GET['theloai'];
                                for($i=1;$i<=$page;$i++){
                                    if($i==$trang){
                                        echo '<li><a class="active" href="shop.php?theloai='.$theloai.'&page='.$i.'">'.$i.'</a></li>';
                                    }
                                    else{
                                        echo '<li><a href="shop.php?theloai='.$theloai.'&page='.$i.'">'.$i.'</a></li>';
                                    }
                                }
                             ?>

                            <li>
                              <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>

                <?php }else{ 

                while ($row=mysqli_fetch_array($qry_tim)){?>
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <a href="single-product.php?id=<?php echo $row['ID_sanpham'] ?>">
                            <?php if($row['Kmai_sanpham']!=0){ ?>
                                <div class="kmai">-<?php echo $row['Kmai_sanpham'] ?>%</div>
                            <?php }?>
                            
                            <img width="200" height="200" src="admin/uploads/<?php echo $row['Hinh_sanpham'] ?>" alt="">
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

                                        echo number_format($giakhuyenmai,0,',','.').' đ';   
                                    ?>  
                                    </ins>
                                    <?php }else{ ?>
                                    <del id="giagoc"><?php echo number_format($row['Gia_sanpham'],0,',','.').' đ';?></del>
                                    <br>
                                    <ins id="giavohinh">...</ins>
                                    <?php } ?>
                                </p>
                            </div>
                        </a> 
                        <div class="order">
                            <?php 
                                $theloai=$_GET['theloai'];
                                $page=$_GET['page'];
                             ?>
                            <a href="shop.php?theloai=<?php echo $theloai ?>&page=<?php echo $page ?>&action=add&id=<?php echo $row['ID_sanpham'] ?>" class="add-to-cart btn btn-default">Đặt hàng</a>
                        </div>    
                    </div>
                </div>
                <?php } ?>

                <?php } ?>
            
            
        </div>
    </div>
</div>